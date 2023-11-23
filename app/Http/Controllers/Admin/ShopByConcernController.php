<?php

namespace App\Http\Controllers;

use App\Models\ShopByConcern;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShopByConcernRequest;
use App\Http\Requests\UpdateShopByConcernRequest;

class ShopByConcernController extends Controller
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
     * @param  \App\Http\Requests\StoreShopByConcernRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShopByConcernRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopByConcern  $shopByConcern
     * @return \Illuminate\Http\Response
     */
    public function show(ShopByConcern $shopByConcern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopByConcern  $shopByConcern
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopByConcern $shopByConcern)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShopByConcernRequest  $request
     * @param  \App\Models\ShopByConcern  $shopByConcern
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShopByConcernRequest $request, ShopByConcern $shopByConcern)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopByConcern  $shopByConcern
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopByConcern $shopByConcern)
    {
        //
    }
}
