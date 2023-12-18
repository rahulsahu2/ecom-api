<?php

namespace App\Http\Controllers;

use App\Models\CategoryBanners;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryBannersRequest;
use App\Http\Requests\UpdateCategoryBannersRequest;

class CategoryBannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryBannersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryBannersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryBanners  $categoryBanners
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryBanners $categoryBanners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryBanners  $categoryBanners
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryBanners $categoryBanners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryBannersRequest  $request
     * @param  \App\Models\CategoryBanners  $categoryBanners
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryBannersRequest $request, CategoryBanners $categoryBanners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryBanners  $categoryBanners
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryBanners $categoryBanners)
    {
        //
    }
}
