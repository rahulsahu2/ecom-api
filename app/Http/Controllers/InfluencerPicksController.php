<?php

namespace App\Http\Controllers;

use App\Models\InfluencerPicks;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInfluencerPicksRequest;
use App\Http\Requests\UpdateInfluencerPicksRequest;

class InfluencerPicksController extends Controller
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
     * @param  \App\Http\Requests\StoreInfluencerPicksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInfluencerPicksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InfluencerPicks  $influencerPicks
     * @return \Illuminate\Http\Response
     */
    public function show(InfluencerPicks $influencerPicks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfluencerPicks  $influencerPicks
     * @return \Illuminate\Http\Response
     */
    public function edit(InfluencerPicks $influencerPicks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInfluencerPicksRequest  $request
     * @param  \App\Models\InfluencerPicks  $influencerPicks
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInfluencerPicksRequest $request, InfluencerPicks $influencerPicks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfluencerPicks  $influencerPicks
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfluencerPicks $influencerPicks)
    {
        //
    }
}
