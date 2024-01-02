<?php

namespace App\Http\Controllers\WEB\Admin\LuxeRange;

use App\Models\lux_range\lux_TopPicks;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Http\Request;

class LuxTopPicksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $shopconcern = lux_TopPicks::get();
        return view('admin.luxe.lux_TopPicks.index',compact('shopconcern'));
    }

    public function create(){
        $shopconcern = null;
        return view('admin.luxe.lux_TopPicks.edit',compact('shopconcern'));
    }

    public function show($id)
    {
        $shopconcern = lux_TopPicks::find($id);
        return view('admin.luxe.lux_TopPicks.edit',compact('shopconcern'));
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

        $shopconcern = lux_TopPicks::find($id);
        if($request->image){
            $exist_banner = $shopconcern->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'lux_TopPicksBanners'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
            $shopconcern->save();
        }

        $shopconcern->title = $request->title;
        $shopconcern->link = $request->link;
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
            'link'=>'required',
        ];
        $customMessages = [
            'image.required' => trans('admin_validation.Image is required'),
            'title.required' => trans('admin_validation.Title is required'),
            'link.required' => trans('admin_validation.Link is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = new lux_TopPicks();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'lux_TopPicksBanners'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
        }
        $shopconcern->title = $request->title;
        $shopconcern->link = $request->link;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $shop = lux_TopPicks::find($id);
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
        $obj = lux_TopPicks::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.product-description.index')->with($notification);
    }
}
