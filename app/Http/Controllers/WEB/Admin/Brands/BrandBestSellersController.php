<?php

namespace App\Http\Controllers\WEB\Admin\Brands;

use App\Models\Brand;
use App\Models\Product;
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
        $brands = Brand::where(['status' => 1])->select('id','name','slug')->get();
        $products = Product::where(['status' => 1])->get();
        return view('admin.Brands.BrandBestSellers.edit',compact('BrandBestSellers','brands','products'));
    }

    public function show($id)
    {
        $BrandBestSellers = BrandBestSellers::find($id);
        $brands = Brand::where(['status' => 1])->select('id','name','slug')->get();
        $products = Product::where(['status' => 1])->get();
        return view('admin.Brands.BrandBestSellers.edit',compact('BrandBestSellers','brands','products'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'product_id'=>'required',
            'brand_id' => 'required',
        ];
        $customMessages = [
            'product_id.required' => trans('admin_validation.Product is required'),
            'brand_id.required' => trans('admin_validation.Brand is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $BrandBestSellers = BrandBestSellers::find($id);
        $BrandBestSellers->brand_id = $request->brand_id;
        $BrandBestSellers->product_id = $request->product_id;
        $BrandBestSellers->isactive = $request->isactive;
        $BrandBestSellers->save();

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function store(Request $request){
        $rules = [
            'product_id'=>'required',
            'brand_id' => 'required',
        ];
        $customMessages = [
            'product_id.required' => trans('admin_validation.Product is required'),
            'brand_id.required' => trans('admin_validation.Brand is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $BrandBestSellers = new BrandBestSellers();
        $BrandBestSellers->brand_id = $request->brand_id;
        $BrandBestSellers->product_id = $request->product_id;
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
