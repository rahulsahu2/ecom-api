<?php

namespace App\Http\Controllers\WEB\Admin\Category;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use App\Models\CategoryBestSellers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryBestSellersRequest;
use App\Http\Requests\UpdateCategoryBestSellersRequest;

class CategoryBestSellersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $brandBanners = CategoryBestSellers::get();
        return view('admin.Category.CategoryBestSellers.index',compact('brandBanners'));
    }

    public function create(){
        $brandBanners = null;
        $products = Product::where(['status' => 1])->get();
        $categories = Category::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Category.CategoryBestSellers.edit',compact('brandBanners','categories','products'));
    }

    public function show($id)
    {
        $brandBanners = CategoryBestSellers::find($id);
        $products = Product::where(['status' => 1])->get();
        $categories = Category::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Category.CategoryBestSellers.edit',compact('brandBanners','categories','products'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'product_id'=>'required',
            'category_id'=>'required',
        ];
        $customMessages = [
            'product_id.required' => trans('admin_validation.Product is required'),
            'category_id.required' => trans('admin_validation.Category is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = CategoryBestSellers::find($id);

        $shopconcern->category_id = $request->category_id;
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
            'category_id'=>'required',
        ];
        $customMessages = [
            'product_id.required' => trans('admin_validation.Product is required'),
            'category_id.required' => trans('admin_validation.Category is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = new CategoryBestSellers();
        $shopconcern->category_id = $request->category_id;
        $shopconcern->product_id = $request->product_id;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $shop = CategoryBestSellers::find($id);
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
        $obj = CategoryBestSellers::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

}
