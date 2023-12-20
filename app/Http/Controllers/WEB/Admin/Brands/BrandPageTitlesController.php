<?php

namespace App\Http\Controllers;

use App\Models\BrandPageTitles;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandPageTitlesRequest;
use App\Http\Requests\UpdateBrandPageTitlesRequest;

class BrandPageTitlesController extends Controller
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
     * @param  \App\Http\Requests\StoreBrandPageTitlesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandPageTitlesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BrandPageTitles  $brandPageTitles
     * @return \Illuminate\Http\Response
     */
    public function show(BrandPageTitles $brandPageTitles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BrandPageTitles  $brandPageTitles
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandPageTitles $brandPageTitles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandPageTitlesRequest  $request
     * @param  \App\Models\BrandPageTitles  $brandPageTitles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandPageTitlesRequest $request, BrandPageTitles $brandPageTitles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BrandPageTitles  $brandPageTitles
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandPageTitles $brandPageTitles)
    {
        //
    }
}
