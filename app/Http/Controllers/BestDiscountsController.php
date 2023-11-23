<?php

namespace App\Http\Controllers;

use App\Models\BestDiscounts;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBestDiscountsRequest;
use App\Http\Requests\UpdateBestDiscountsRequest;

class BestDiscountsController extends Controller
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
     * @param  \App\Http\Requests\StoreBestDiscountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBestDiscountsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BestDiscounts  $bestDiscounts
     * @return \Illuminate\Http\Response
     */
    public function show(BestDiscounts $bestDiscounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BestDiscounts  $bestDiscounts
     * @return \Illuminate\Http\Response
     */
    public function edit(BestDiscounts $bestDiscounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBestDiscountsRequest  $request
     * @param  \App\Models\BestDiscounts  $bestDiscounts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBestDiscountsRequest $request, BestDiscounts $bestDiscounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BestDiscounts  $bestDiscounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(BestDiscounts $bestDiscounts)
    {
        //
    }
}
