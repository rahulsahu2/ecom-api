<?php

namespace App\Http\Controllers\WEB\Admin\Category;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

use App\Models\CategoryOfferBrands;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryOfferBrandsRequest;
use App\Http\Requests\UpdateCategoryOfferBrandsRequest;

class CategoryOfferBrandsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $brandBanners = CategoryOfferBrands::get();
        $categories = Category::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Category.CategoryOfferBrands.index',compact('brandBanners','categories'));
    }

    public function create(){
        $brandBanners = null;
        $categories = Category::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Category.CategoryOfferBrands.edit',compact('brandBanners','categories'));
    }

    public function show($id)
    {
        $brandBanners = CategoryOfferBrands::find($id);
        $categories = Category::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Category.CategoryOfferBrands.edit',compact('brandBanners','categories'));
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

        $shopconcern = CategoryOfferBrands::find($id);
        if($request->image){
            $exist_banner = $shopconcern->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'CategoryOfferBrands'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
            $shopconcern->save();
        }

        $shopconcern->category_id = $request->category_id;
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

        $shopconcern = new CategoryOfferBrands();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'CategoryOfferBrands'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
        }
        
        $shopconcern->category_id = $request->category_id;
        $shopconcern->title = $request->title;
        $shopconcern->description = $request->description;
        $shopconcern->link = $request->link;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $shop = CategoryOfferBrands::find($id);
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
        $obj = CategoryOfferBrands::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

}
