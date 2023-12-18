<?php

namespace App\Http\Controllers\WEB\Admin\Brands;

use Illuminate\Http\Request;
use App\Models\Brands\BrandBanners;
use App\Http\Controllers\Controller;
use Image;

class BrandBannersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $brandBanners = BrandBanners::get();
        return view('admin.Brands.BrandBanners.index',compact('brandBanners'));
    }

    public function create(){
        $brandBanners = null;
        return view('admin.Brands.BrandBanners.edit',compact('brandBanners'));
    }

    public function show($id)
    {
        $brandBanners = BrandBanners::find($id);
        return view('admin.Brands.BrandBanners.edit',compact('brandBanners'));
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

        $brandBanners = BrandBanners::find($id);
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'BrandBanners'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $brandBanners->image = $banner_name;
            $brandBanners->save();
        }

        $brandBanners->title = $request->title;
        $brandBanners->link = $request->link;
        $brandBanners->isactive = $request->isactive;
        $brandBanners->save();

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

        $brandBanners = new BrandBanners();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'BrandBanners'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $brandBanners->image = $banner_name;
        }
        $brandBanners->title = $request->title;
        $brandBanners->link = $request->link;
        $brandBanners->isactive = $request->isactive;
        $brandBanners->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $obj = BrandBanners::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.brand-banners.index')->with($notification);
    }

    public function changeStatus($id){
        $shop = BrandBanners::find($id);
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
}
