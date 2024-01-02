<?php

namespace App\Http\Controllers\WEB\Admin\LuxeRange;

use App\Http\Controllers\Controller;
use App\Models\lux_range\lux_BestSellers;
use App\Models\Product;
use Illuminate\Http\Request;

class LuxBestSellersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $brandBanners = lux_BestSellers::get();
        return view('admin.luxe.lux_BestSellers.index',compact('brandBanners'));
    }

    public function create(){
        $brandBanners = null;
        $products = Product::where(['status' => 1])->get();
        return view('admin.luxe.lux_BestSellers.edit',compact('brandBanners','products'));
    }

    public function show($id)
    {
        $brandBanners = lux_BestSellers::find($id);
        $products = Product::where(['status' => 1])->get();
        return view('admin.luxe.lux_BestSellers.edit',compact('brandBanners','products'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'product_id'=>'required',
        ];
        $customMessages = [
            'product_id.required' => trans('admin_validation.Product is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = lux_BestSellers::find($id);

        $shopconcern->product_id = $request->product_id;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function store(Request $request){
        $rules = [
            'product_id'=>'required',
        ];
        $customMessages = [
            'product_id.required' => trans('admin_validation.Product is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = new lux_BestSellers();
        $shopconcern->product_id = $request->product_id;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $shop = lux_BestSellers::find($id);
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
        $obj = lux_BestSellers::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.product-description.index')->with($notification);
    }
}
