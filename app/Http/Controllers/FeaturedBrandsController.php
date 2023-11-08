<?php

namespace App\Http\Controllers;

use App\Models\featuredBrands;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorefeaturedBrandsRequest;
use App\Http\Requests\UpdatefeaturedBrandsRequest;

class FeaturedBrandsController extends Controller
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
     * @param  \App\Http\Requests\StorefeaturedBrandsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefeaturedBrandsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\featuredBrands  $featuredBrands
     * @return \Illuminate\Http\Response
     */
    public function show(featuredBrands $featuredBrands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\featuredBrands  $featuredBrands
     * @return \Illuminate\Http\Response
     */
    public function edit(featuredBrands $featuredBrands)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefeaturedBrandsRequest  $request
     * @param  \App\Models\featuredBrands  $featuredBrands
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefeaturedBrandsRequest $request, featuredBrands $featuredBrands)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\featuredBrands  $featuredBrands
     * @return \Illuminate\Http\Response
     */
    public function destroy(featuredBrands $featuredBrands)
    {
        //
    }
}
