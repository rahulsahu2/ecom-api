<?php

namespace App\Http\Controllers;

use App\Models\BestDiscountProducts;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBestDiscountProductsRequest;
use App\Http\Requests\UpdateBestDiscountProductsRequest;

class BestDiscountProductsController extends Controller
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
     * @param  \App\Http\Requests\StoreBestDiscountProductsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBestDiscountProductsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BestDiscountProducts  $bestDiscountProducts
     * @return \Illuminate\Http\Response
     */
    public function show(BestDiscountProducts $bestDiscountProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BestDiscountProducts  $bestDiscountProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(BestDiscountProducts $bestDiscountProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBestDiscountProductsRequest  $request
     * @param  \App\Models\BestDiscountProducts  $bestDiscountProducts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBestDiscountProductsRequest $request, BestDiscountProducts $bestDiscountProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BestDiscountProducts  $bestDiscountProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(BestDiscountProducts $bestDiscountProducts)
    {
        //
    }
}
