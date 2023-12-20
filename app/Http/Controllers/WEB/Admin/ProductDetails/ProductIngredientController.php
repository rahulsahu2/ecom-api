<?php

namespace App\Http\Controllers\WEB\Admin\ProductDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use App\Models\ProductIngredient;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductIngredientRequest;
use App\Http\Requests\UpdateProductIngredientRequest;

class ProductIngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $shopconcern = ProductIngredient::get();
        return view('admin.ProductIngredient.index',compact('shopconcern'));
    }

    public function create(){
        $shopconcern = null;
        $products = Product::orderBy('id','desc')->where(['status' => 1, 'approve_by_admin' => 1])->get();
        return view('admin.ProductIngredient.edit',compact('shopconcern','products'));
    }

    public function show($id)
    {
        $shopconcern = ProductIngredient::find($id);
        $products = Product::orderBy('id','desc')->where(['status' => 1, 'approve_by_admin' => 1])->get();
        return view('admin.ProductIngredient.edit',compact('shopconcern'.'products'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title'=>'required',
        ];
        $customMessages = [
            'title.required' => trans('admin_validation.Title is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = ProductIngredient::find($id);
        if($request->image){
            $exist_banner = $shopconcern->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'ProductIngredient'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
            $shopconcern->save();
        }

        $shopconcern->title = $request->title;
        $shopconcern->description = '';
        $shopconcern->product_id = $request->product_id;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function store(Request $request){
        $rules = [
            'image' => 'required',
            'title'=>'required',
        ];
        $customMessages = [
            'image.required' => trans('admin_validation.Image is required'),
            'title.required' => trans('admin_validation.Title is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = new ProductIngredient();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'ProductIngredient'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
        }
        $shopconcern->title = $request->title;
        $shopconcern->description = '';
        $shopconcern->product_id = $request->product_id;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $shop = ProductIngredient::find($id);
        if($shop->isactive==1){
            $shop->isactive=0;
            $shop->save();
            $message= trans('admin_validation.Inactive Successfully');
        }else{
            $shop->isactive=1;
            $shop->save();
            $message= trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }

    public function destroy($id)
    {
        $obj = ProductIngredient::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.brand-banners.index')->with($notification);
    }
}
