<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section8;
use Illuminate\Http\Request;
use Image;
use File;
class Section8Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $shopconcern = Section8::get();
        return view('admin.Section8.index',compact('shopconcern'));
    }

    public function create(){
        $shopconcern = null;
        return view('admin.Section8.edit',compact('shopconcern'));
    }

    public function show($id)
    {
        $shopconcern = Section8::find($id);
        return view('admin.Section8.edit',compact('shopconcern'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'id'=>'required',
        ];
        $customMessages = [
            'id.required' => trans('admin_validation.Product is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = Section8::find($id);
        $shopconcern->id = $request->id;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function store(Request $request){
        $rules = [
            'id'=>'required',
        ];
        $customMessages = [
            'id.required' => trans('admin_validation.Product is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $shopconcern = new Section8();
        $shopconcern->id = $request->id;
        $shopconcern->isactive = $request->isactive;
        $shopconcern->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
    public function changeStatus($id){
        $shop = Section8::find($id);
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
