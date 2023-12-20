<?php

namespace App\Http\Controllers\WEB\Admin\ProductDetails;
use App\Models\Product;
use App\Models\ProductDescription;
use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductDescriptionRequest;
use App\Http\Requests\UpdateProductDescriptionRequest;

class ProductDescriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $shopconcern = ProductDescription::get();
        return view('admin.ProductDescription.index',compact('shopconcern'));
    }

    public function create(){
        $shopconcern = null;
        $products = Product::orderBy('id','desc')->where(['status' => 1, 'approve_by_admin' => 1])->get();
        return view('admin.ProductDescription.edit',compact('shopconcern','products'));
    }

    public function show($id)
    {
        $shopconcern = ProductDescription::find($id);
        $products = Product::orderBy('id','desc')->where(['status' => 1, 'approve_by_admin' => 1])->get();
        return view('admin.ProductDescription.edit',compact('shopconcern','products'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title'=>'required',
            'product_id'=>'required',
        ];
        $customMessages = [
            'title.required' => trans('admin_validation.Title is required'),
            'product_id.required' => trans('admin_validation.Product is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = ProductDescription::find($id);
        if($request->image){
            $exist_banner = $shopconcern->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'ProductDescription'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
            $shopconcern->save();
        }

        $shopconcern->title = $request->title;
        $shopconcern->description = $request->description;
        $shopconcern->product_id = $request->product_id;
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
        ];
        $customMessages = [
            'image.required' => trans('admin_validation.Image is required'),
            'title.required' => trans('admin_validation.Title is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = new ProductDescription();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'ProductDescription'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
        }
        $shopconcern->title = $request->title;
        $shopconcern->description = $request->description;
        $shopconcern->Product_id = $request->product_id;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $shop = ProductDescription::find($id);
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
        $obj = ProductDescription::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.product-description.index')->with($notification);
    }

}
