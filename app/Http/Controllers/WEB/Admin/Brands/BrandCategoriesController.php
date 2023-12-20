<?php

namespace App\Http\Controllers\WEB\Admin\Brands;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;
use App\Models\Brands\BrandCategories;
use App\Http\Controllers\Controller;

class BrandCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $BrandCategories = BrandCategories::get();
        return view('admin.Brands.BrandCategories.index',compact('BrandCategories'));
    }

    public function create(){
        $BrandCategories = null;
        $brands = Brand::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Brands.BrandCategories.edit',compact('BrandCategories','brands'));
    }

    public function show($id)
    {
        $BrandCategories = BrandCategories::find($id);
        $brands = Brand::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Brands.BrandCategories.edit',compact('BrandCategories','brands'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title'=>'required',
            'link'=>'required',
            'brand_id' => 'required',
        ];
        $customMessages = [
            'title.required' => trans('admin_validation.Title is required'),
            'link.required' => trans('admin_validation.Link is required'),
            'brand_id.required' => trans('admin_validation.Brand is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $BrandCategories = BrandCategories::find($id);
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'BrandCategories'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $BrandCategories->image = $banner_name;
            $BrandCategories->save();
        }

        $BrandCategories->title = $request->title;
        $BrandCategories->brand_id = $request->brand_id;
        $BrandCategories->link = $request->link;
        $BrandCategories->isactive = $request->isactive;
        $BrandCategories->save();

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

        $BrandCategories = new BrandCategories();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'BrandCategories'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $BrandCategories->image = $banner_name;
        }
        $BrandCategories->title = $request->title;
        $BrandCategories->brand_id = $request->brand_id;
        $BrandCategories->link = $request->link;
        $BrandCategories->isactive = $request->isactive;
        $BrandCategories->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $obj = BrandCategories::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.brand-categories.index')->with($notification);
    }

    public function changeStatus($id){
        $shop = BrandCategories::find($id);
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
