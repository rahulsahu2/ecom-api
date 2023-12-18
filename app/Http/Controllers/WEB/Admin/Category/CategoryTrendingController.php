<?php

namespace App\Http\Controllers;

use App\Models\CategoryTrending;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryTrendingRequest;
use App\Http\Requests\UpdateCategoryTrendingRequest;

class CategoryTrendingController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoryTrendingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryTrendingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryTrending  $categoryTrending
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryTrending $categoryTrending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryTrending  $categoryTrending
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryTrending $categoryTrending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryTrendingRequest  $request
     * @param  \App\Models\CategoryTrending  $categoryTrending
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryTrendingRequest $request, CategoryTrending $categoryTrending)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryTrending  $categoryTrending
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryTrending $categoryTrending)
    {
        //
    }
}
