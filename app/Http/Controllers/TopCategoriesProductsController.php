<?php

namespace App\Http\Controllers;

use App\Models\TopCategoriesProducts;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopCategoriesProductsRequest;
use App\Http\Requests\UpdateTopCategoriesProductsRequest;

class TopCategoriesProductsController extends Controller
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
     * @param  \App\Http\Requests\StoreTopCategoriesProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopCategoriesProductsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopCategoriesProducts  $topCategoriesProducts
     * @return \Illuminate\Http\Response
     */
    public function show(TopCategoriesProducts $topCategoriesProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopCategoriesProducts  $topCategoriesProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(TopCategoriesProducts $topCategoriesProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopCategoriesProductsRequest  $request
     * @param  \App\Models\TopCategoriesProducts  $topCategoriesProducts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopCategoriesProductsRequest $request, TopCategoriesProducts $topCategoriesProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopCategoriesProducts  $topCategoriesProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopCategoriesProducts $topCategoriesProducts)
    {
        //
    }
}
