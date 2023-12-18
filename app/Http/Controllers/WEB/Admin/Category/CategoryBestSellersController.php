<?php

namespace App\Http\Controllers;

use App\Models\CategoryBestSellers;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryBestSellersRequest;
use App\Http\Requests\UpdateCategoryBestSellersRequest;

class CategoryBestSellersController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoryBestSellersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryBestSellersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryBestSellers  $categoryBestSellers
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryBestSellers $categoryBestSellers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryBestSellers  $categoryBestSellers
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryBestSellers $categoryBestSellers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryBestSellersRequest  $request
     * @param  \App\Models\CategoryBestSellers  $categoryBestSellers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryBestSellersRequest $request, CategoryBestSellers $categoryBestSellers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryBestSellers  $categoryBestSellers
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryBestSellers $categoryBestSellers)
    {
        //
    }
}
