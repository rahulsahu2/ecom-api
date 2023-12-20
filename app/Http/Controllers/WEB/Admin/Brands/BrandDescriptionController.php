<?php

namespace App\Http\Controllers\WEB\Admin\Brands;

use App\Models\Brand;
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
        $brands = Brand::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Brands.BrandDescription.edit',compact('BrandDescription','brands'));
    }

    public function show($id)
    {
        $BrandDescription = BrandDescription::find($id);
        $brands = Brand::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Brands.BrandDescription.edit',compact('BrandDescription','brands'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'brand_id'=>'required',
        ];
        $customMessages = [
            'brand_id.required' => trans('admin_validation.Brand is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $BrandDescription = BrandDescription::find($id);
        $BrandDescription->brand_id = $request->brand_id;
        $BrandDescription->content = $request->content;
        $BrandDescription->isactive = $request->isactive;
        $BrandDescription->save();

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function store(Request $request){
        $rules = [
            'brand_id'=>'required',
        ];
        $customMessages = [
            'brand_id.required' => trans('admin_validation.Brand is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $BrandDescription = new BrandDescription();
        $BrandDescription->brand_id = $request->brand_id;
        $BrandDescription->content = $request->content;
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
