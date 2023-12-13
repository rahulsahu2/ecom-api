<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Carbon\Carbon;
use Auth;
use App\Mail\UserRegistration;
use App\Helpers\MailHelper;
use App\Models\EmailTemplate;
use App\Models\SmsTemplate;
use App\Models\TwilioSms;
use App\Models\Setting;
use App\Models\BiztechSms;
use Mail;
use Str;
use Exception;

use Twilio\Rest\Client;

class RegisterController extends Controller
{

    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest:api');
    }

    public function storeRegister(Request $request){
        $rules = [
            'name'=>'required',
            'agree'=>'required',
            'email'=>'required',
            'password'=>'required|min:4'
        ];
        $customMessages = [
            'name.required' => trans('user_validation.Name is required'),
            'email.required' => trans('user_validation.Email is required'),
            'password.required' => trans('user_validation.Password is required'),
            'password.min' => trans('user_validation.Password must be 4 characters'),
            'agree.required' => trans('user_validation.Consent filed is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = User::where('email',$request->email)->first();
        if($user != null && $user->email_verified == 0){
            MailHelper::setMailConfig();

            $template=EmailTemplate::where('id',4)->first();
            $subject=$template->subject;
            $message=$template->description;
            $message = str_replace('{{user_name}}',$request->name,$message);
            Mail::to($user->email)->send(new UserRegistration($message,$subject,$user));
    
            $notification = trans('user_validation.Register Successfully. Please Verify your email');
            return response()->json(['notification' => $notification],201);
        }
        if($user != null){
            $notification = trans('Email already Registred Please Login.');
            return response()->json(['notification' => $notification],403);
        }
        $otp = random_int(100000, 999999);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone ? $request->phone : '';
        $user->agree_policy = $request->agree ? 1 : 0;
        $user->verify_token = $otp;
        $user->password = Hash::make($otp);
        $user->save();
        
        MailHelper::setMailConfig();

        $template=EmailTemplate::where('id',4)->first();
        $subject=$template->subject;
        $message=$template->description;
        $message = str_replace('{{user_name}}',$request->name,$message);
        Mail::to($user->email)->send(new UserRegistration($message,$subject,$user));

        $notification = trans('user_validation.Register Successfully. Please Verify your email');
        return response()->json(['notification' => $notification],201);
    }

    public function resendRegisterCode(Request $request){
        $setting = Setting::first();
        $enable_phone_required = $setting->phone_number_required;

        $rules = [
            'email'=>'required',
            'phone'=> $enable_phone_required == 1 ? 'required' : '',
        ];
        $customMessages = [
            'email.required' => trans('user_validation.Email is required'),
            'phone.required' => trans('user_validation.Phone number is required'),
            'phone.unique' => trans('user_validation.Phone number already exist'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = User::where('email', $request->email)->first();
        if($user){
            if($user->email_verified == 0){
                MailHelper::setMailConfig();

                $template=EmailTemplate::where('id',4)->first();
                $subject=$template->subject;
                $message=$template->description;
                $message = str_replace('{{user_name}}',$user->name,$message);
                Mail::to($user->email)->send(new UserRegistration($message,$subject,$user));

                $notification = trans('user_validation.Register Successfully. Please Verify your email');
                return response()->json(['notification' => $notification]);

            }else{
                $notification = trans('user_validation.Already verfied your account');
                return response()->json(['notification' => $notification],402);
            }
        }else{
            $notification = trans('user_validation.Email does not exist');
            return response()->json(['notification' => $notification],402);
        }

    }


    public function userVerification($token){
        $user = User::where('verify_token',$token)->first();
        if($user){
            $user->verify_token = null;
            $user->status = 1;
            $user->email_verified = 1;
            $user->save();
            $credential=[
                'email'=> $user->email,
                'password'=> $token
            ];
            if (! $token = Auth::guard('api')->attempt($credential, ['exp' => Carbon::now()->addDays(365)->timestamp])) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
           
            $isVendor = Vendor::where('user_id',$user->id)->first();
            $notification = $this->respondWithToken($token,$isVendor ? 1 : 0,$user);
            return response()->json(['notification' => $notification],200);
        }else{
            $notification = trans('user_validation.Invalid token');
            return response()->json(['notification' => $notification],400);
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function respondWithToken($token, $vendor,$user)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'is_vendor' => $vendor,
            'user' => $user
        ]);
    }
}
