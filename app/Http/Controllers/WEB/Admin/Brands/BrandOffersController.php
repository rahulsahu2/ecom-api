<?php

namespace App\Http\Controllers\WEB\Admin\Brands;

use Illuminate\Http\Request;
use Image;
use App\Models\Brands\BrandOffers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandOffersRequest;
use App\Http\Requests\UpdateBrandOffersRequest;

class BrandOffersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $BrandOffers = BrandOffers::get();
        return view('admin.Brands.BrandOffers.index',compact('BrandOffers'));
    }

    public function create(){
        $BrandOffers = null;
        return view('admin.Brands.BrandOffers.edit',compact('BrandOffers'));
    }

    public function show($id)
    {
        $BrandOffers = BrandOffers::find($id);
        return view('admin.Brands.BrandOffers.edit',compact('BrandOffers'));
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

        $BrandOffers = BrandOffers::find($id);
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'BrandOffers'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $BrandOffers->image = $banner_name;
            $BrandOffers->save();
        }

        $BrandOffers->title = $request->title;
        $BrandOffers->link = $request->link;
        $BrandOffers->isactive = $request->isactive;
        $BrandOffers->save();

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

        $BrandOffers = new BrandOffers();
        if($request->image){
            $extention = $request->image->getClientOriginalExtension();
            $banner_name = 'BrandOffers'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->image)
                ->save(public_path().'/'.$banner_name);
            $BrandOffers->image = $banner_name;
        }
        $BrandOffers->title = $request->title;
        $BrandOffers->link = $request->link;
        $BrandOffers->isactive = $request->isactive;
        $BrandOffers->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        $obj = BrandOffers::find($id);
        $obj->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification=array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.brand-offers.index')->with($notification);
    }

    public function changeStatus($id){
        $shop = BrandOffers::find($id);
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
