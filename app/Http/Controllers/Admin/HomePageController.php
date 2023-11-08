<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerImage;
use App\Models\PopularCategory;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\ThreeColumnCategory;
use App\Models\FeaturedCategory;
use App\Model\FeaturedBrands;
use App\Models\Setting;
use Image;
use File;
class HomePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin-api');
    }


    public function popularCategory(){
        $popularCategories = PopularCategory::with('category')->get();
        return response()->json(['popularCategories' => $popularCategories], 200);
    }


    public function storePopularCategory(Request $request){

        $isExist = 0;
        if($request->category_id){
            $isExist = PopularCategory::where('category_id', $request->category_id)->count();
        }

        $rules = [
            'category_id' => $isExist == 0 ? 'required' : 'required|unique:popular_categories',
        ];
        $customMessages = [
            'category_id.required' => trans('Category is required'),
            'category_id.unique' => trans('Category already exist'),
        ];
        $this->validate($request, $rules,$customMessages);

        $category = new PopularCategory();
        $category->category_id = $request->category_id;
        $category->save();

        $notification= trans('Create Successfully');
        return response()->json(['notification' => $notification], 200);
    }

    public function destroyPopularCategory($id){

        $category = PopularCategory::where('id', $id)->first();
        $category->delete();

        $notification= trans('Delete Successfully');
        return response()->json(['message' => $notification], 200);
    }


    public function featuredCategory(){
        $featuredCategories = FeaturedCategory::with('category')->get();
        return response()->json(['featuredCategories' => $featuredCategories], 200);
    }

    public function storeFeaturedCategory(Request $request){

        $isExist = 0;
        if($request->category_id){
            $isExist = FeaturedCategory::where('category_id', $request->category_id)->count();
        }

        $rules = [
            'category_id' => $isExist == 0 ? 'required' : 'required|unique:featured_categories',
        ];
        $customMessages = [
            'category_id.required' => trans('Category is required'),
            'category_id.unique' => trans('Category already exist'),
        ];
        $this->validate($request, $rules,$customMessages);

        $category = new FeaturedCategory();
        $category->category_id = $request->category_id;
        $category->save();

        $notification= trans('Create Successfully');
        return response()->json(['notification' => $notification], 200);
    }

    public function destroyFeaturedCategory($id){

        $category = FeaturedCategory::where('id', $id)->first();
        $category->delete();

        $notification= trans('Delete Successfully');
        return response()->json(['message' => $notification], 200);
    }

    public function featuredBrands(){
        $brands = FeaturedBrands::with('brand')->get();
        $featuredCategories = FeaturedCategory::with('category')->get();
        return response()->json([''=> $featuredCategories,'brands' => $brands], 200);
    }

    public function storeFeaturedBrands(Request $request){

        $isExist = 0;
        if($request->category_id){
            $isExist = FeaturedBrands::where('category_id', $request->category_id)->count();
        }
        $isBrandExist = 0;
        if($request->brand_id){
            $isExist = FeaturedBrands::where('brand_id', $request->brand_id)->count();
        }

        $rules = [
            'category_id' => $isExist == 0 ? 'required' : 'required|unique:featured_brands',
            'brand_id' => $isBrandExist == 0 ? 'required':'required|unique:featured_brands',
        ];
        $customMessages = [
            'category_id.required' => trans('Category is required'),
            'category_id.unique' => trans('Category already exist'),
            'brand_id.required' => trans('Brand is required'),
            'brand_id.unique' => trans('Brand already exist'),
        ];
        $this->validate($request, $rules,$customMessages);

        $brand = new FeaturedBrands();
        $brand->category_id = $request->category_id;
        $brand->brand_id = $request->brand_id;
        $brand->save();

        $notification= trans('Create Successfully');
        return response()->json(['notification' => $notification], 200);
    }

    public function destroyFeaturedBrands($id){

        $brand = FeaturedBrands::where('id', $id)->first();
        $brand->delete();

        $notification= trans('Delete Successfully');
        return response()->json(['message' => $notification], 200);
    }
}
