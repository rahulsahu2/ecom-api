<?php

namespace App\Http\Controllers;

use App\Models\CategoryList;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryListRequest;
use App\Http\Requests\UpdateCategoryListRequest;

class CategoryListController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoryListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryList  $categoryList
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryList $categoryList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryList  $categoryList
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryList $categoryList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryListRequest  $request
     * @param  \App\Models\CategoryList  $categoryList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryListRequest $request, CategoryList $categoryList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryList  $categoryList
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryList $categoryList)
    {
        //
    }
}
