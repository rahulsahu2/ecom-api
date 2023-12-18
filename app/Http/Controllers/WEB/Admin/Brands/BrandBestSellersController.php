<?php

namespace App\Http\Controllers\WEB\Admin\Brands;

use Illuminate\Http\Request;
use Image;
use App\Models\Brands\BrandBestSellers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandBestSellersRequest;
use App\Http\Requests\UpdateBrandBestSellersRequest;

class BrandBestSellersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $BrandBestSellers = BrandBestSellers::get();
        return view('admin.Brands.BrandBestSellers.index',compact('BrandBestSellers'));
    }

    public function create(){
        $BrandBestSellers = null;
        return view('admin.Brands.BrandBestSellers.edit',compact('BrandBestSellers'));
    }

    public function show($id)
    {
        $BrandBestSellers = BrandBestSellers::find($id);
        return view('admin.Brands.BrandBestSellers.edit',compact('BrandBestSellers'));
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

        $BrandBestSellers = BrandBestSellers::find($id);
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'BrandBestSellers'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $BrandBestSellers->image = $banner_name;
            $BrandBestSellers->save();
        }

        $BrandBestSellers->title = $request->title;
        $BrandBestSellers->link = $request->link;
        $BrandBestSellers->isactive = $request->isactive;
        $BrandBestSellers->save();

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

        $BrandBestSellers = new BrandBestSellers();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'BrandBestSellers'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $BrandBestSellers->image = $banner_name;
        }
        $BrandBestSellers->title = $request->title;
        $BrandBestSellers->link = $request->link;
        $BrandBestSellers->isactive = $request->isactive;
        $BrandBestSellers->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $obj = BrandBestSellers::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.brand-best-sellers.index')->with($notification);
    }

    public function changeStatus($id){
        $shop = BrandBestSellers::find($id);
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
