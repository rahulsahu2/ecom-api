<?php

namespace App\Http\Controllers;

use App\Models\featuredProducts;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorefeaturedProductsRequest;
use App\Http\Requests\UpdatefeaturedProductsRequest;

class FeaturedProductsController extends Controller
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
     * @param  \App\Http\Requests\StorefeaturedProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefeaturedProductsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\featuredProducts  $featuredProducts
     * @return \Illuminate\Http\Response
     */
    public function show(featuredProducts $featuredProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\featuredProducts  $featuredProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(featuredProducts $featuredProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefeaturedProductsRequest  $request
     * @param  \App\Models\featuredProducts  $featuredProducts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefeaturedProductsRequest $request, featuredProducts $featuredProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\featuredProducts  $featuredProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(featuredProducts $featuredProducts)
    {
        //
    }
}
