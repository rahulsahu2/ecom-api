<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\featuredProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class FeaturedProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $shopconcern = featuredProducts::with('product')->get();
        return view('admin.featuredProducts.index',compact('shopconcern'));
    }

    public function create(){
        $shopconcern = null;
        $products = Product::where('status',1)->where('approve_by_admin', 1)->orderBy('id','desc')->get();
        return view('admin.featuredProducts.edit',compact('shopconcern','products'));
    }

    public function show($id)
    {
        $shopconcern = featuredProducts::find($id);
        $products = Product::where('status',1)->where('approve_by_admin', 1)->orderBy('id','desc')->get();
        return view('admin.featuredProducts.edit',compact('shopconcern','products'));
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

        $shopconcern = featuredProducts::find($id);
        $shopconcern->product_id = $request->product_id;
        $shopconcern->status = $request->status;
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

        $shopconcern = new featuredProducts();
        $shopconcern->product_id = $request->product_id;
        $shopconcern->status = $request->status;
        $shopconcern->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        $obj = featuredProducts::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.featured-products.index')->with($notification);
    }
    public function changeStatus($id){
        $shop = featuredProducts::find($id);
        if($shop->status==1){
            $shop->status=0;
            $shop->save();
            $message= trans('admin_validation.Inactive Successfully');
        }else{
            $shop->status=1;
            $shop->save();
            $message= trans('admin_validation.Active Successfully');
        }
        return response()->json($message);
    }

}
