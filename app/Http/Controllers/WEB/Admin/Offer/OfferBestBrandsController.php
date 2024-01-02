<?php

namespace App\Http\Controllers\WEB\Admin\Offer;

use App\Models\Brand;
use App\Models\Offer\offer_BestBrands;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferBestBrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $brandBanners = offer_BestBrands::get();
        return view('admin.offer.offer_BestBrands.index',compact('brandBanners'));
    }

    public function create(){
        $brandBanners = null;
        $products = Brand::where(['status' => 1])->get();
        return view('admin.offer.offer_BestBrands.edit',compact('brandBanners','products'));
    }

    public function show($id)
    {
        $brandBanners = offer_BestBrands::find($id);
        $products = Brand::where(['status' => 1])->get();
        return view('admin.offer.offer_BestBrands.edit',compact('brandBanners','products'));
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

        $shopconcern = offer_BestBrands::find($id);

        $shopconcern->brand_id = $request->brand_id;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

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

        $shopconcern = new offer_BestBrands();
        $shopconcern->brand_id = $request->brand_id;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $shop = offer_BestBrands::find($id);
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
        $obj = offer_BestBrands::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
