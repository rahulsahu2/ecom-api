<?php

namespace App\Http\Controllers\WEB\Admin\Brands;

use Illuminate\Http\Request;
use Image;
use App\Models\Brands\BrandDescription;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandDescriptionRequest;
use App\Http\Requests\UpdateBrandDescriptionRequest;

class BrandDescriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $BrandDescription = BrandDescription::get();
        return view('admin.Brands.BrandDescription.index',compact('BrandDescription'));
    }

    public function create(){
        $BrandDescription = null;
        return view('admin.Brands.BrandDescription.edit',compact('BrandDescription'));
    }

    public function show($id)
    {
        $BrandDescription = BrandDescription::find($id);
        return view('admin.Brands.BrandDescription.edit',compact('BrandDescription'));
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

        $BrandDescription = BrandDescription::find($id);
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'BrandDescription'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $BrandDescription->image = $banner_name;
            $BrandDescription->save();
        }

        $BrandDescription->title = $request->title;
        $BrandDescription->link = $request->link;
        $BrandDescription->isactive = $request->isactive;
        $BrandDescription->save();

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

        $BrandDescription = new BrandDescription();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'BrandDescription'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $BrandDescription->image = $banner_name;
        }
        $BrandDescription->title = $request->title;
        $BrandDescription->link = $request->link;
        $BrandDescription->isactive = $request->isactive;
        $BrandDescription->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $obj = BrandDescription::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.brand-description.index')->with($notification);
    }

    public function changeStatus($id){
        $shop = BrandDescription::find($id);
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
