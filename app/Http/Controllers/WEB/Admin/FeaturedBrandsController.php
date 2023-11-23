<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\featuredBrands;
use Illuminate\Http\Request;
use Image;
use File;
class FeaturedBrandsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $shopconcern = featuredBrands::get();
        return view('admin.featuredBrands.index',compact('shopconcern'));
    }

    public function create(){
        $shopconcern = null;
        return view('admin.featuredBrands.edit',compact('shopconcern'));
    }

    public function show($id)
    {
        $shopconcern = featuredBrands::find($id);
        return view('admin.featuredBrands.edit',compact('shopconcern'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title'=>'required',
            'link'=>'required',
        ];
        $customMessages = [
            'title.required' => trans('admin_validation.Title is required'),
            'link.required' => trans('admin_validation.Link is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = featuredBrands::find($id);
        if($request->image){
            $exist_banner = $shopconcern->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'featuredBrands'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
            $shopconcern->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        $shopconcern->title = $request->title;
        $shopconcern->description = $request->description;
        $shopconcern->link = $request->link;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->ismain = $request->ismain;
        $shopconcern->save();

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function store(Request $request){
        $rules = [
            'image' => 'required',
            'title'=>'required',
            'link'=>'required',
        ];
        $customMessages = [
            'image.required' => trans('admin_validation.Image is required'),
            'title.required' => trans('admin_validation.Title is required'),
            'link.required' => trans('admin_validation.Link is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = new featuredBrands();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'featuredBrands'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
        }
        $shopconcern->title = $request->title;
        $shopconcern->description = $request->description;
        $shopconcern->link = $request->link;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->ismain = $request->ismain;
        $shopconcern->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $shop = featuredBrands::find($id);
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

    public function changeMain($id){
        $shop = featuredBrands::find($id);
        if($shop->ismain==1){
            $shop->ismain=0;
            $shop->save();
            $message= trans('admin_validation.Inactive Successfully');
        }else{
            $shop->ismain=1;
            $shop->save();
            $message= trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }

}
