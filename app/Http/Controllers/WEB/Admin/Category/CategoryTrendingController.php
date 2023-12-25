<?php
namespace App\Http\Controllers\WEB\Admin\Category;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

use App\Models\CategoryTrending;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryTrendingRequest;
use App\Http\Requests\UpdateCategoryTrendingRequest;

class CategoryTrendingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $shopconcern = CategoryTrending::get();
        $categories = Category::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Category.CategoryTrending.index',compact('shopconcern','categories'));
    }

    public function create(){
        $shopconcern = null;
        $categories = Category::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Category.CategoryTrending.edit',compact('shopconcern','categories'));
    }

    public function show($id)
    {
        $shopconcern = CategoryTrending::find($id);
        $categories = Category::where(['status' => 1])->select('id','name','slug')->get();
        return view('admin.Category.CategoryTrending.edit',compact('shopconcern','categories'));
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

        $shopconcern = CategoryTrending::find($id);
        if($request->image){
            $exist_banner = $shopconcern->image;
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'CategoryTrending'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $shopconcern->image = $banner_name;
            $shopconcern->save();
        }

        $shopconcern->category_id = $request->category_id;
        $shopconcern->title = $request->title;
        $shopconcern->description = $request->description;
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

        $shopconcern = new CategoryTrending();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'CategoryTrending'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
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
        $shop = CategoryTrending::find($id);
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
        $obj = CategoryTrending::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.product-description.index')->with($notification);
    }
}
