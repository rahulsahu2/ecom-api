<?php

namespace App\Http\Controllers;

use App\Models\LuxPageSectionTitle;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLuxPageSectionTitleRequest;
use App\Http\Requests\UpdateLuxPageSectionTitleRequest;

class LuxPageSectionTitleController extends Controller
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
     * @param  \App\Http\Requests\StoreLuxPageSectionTitleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLuxPageSectionTitleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LuxPageSectionTitle  $luxPageSectionTitle
     * @return \Illuminate\Http\Response
     */
    public function show(LuxPageSectionTitle $luxPageSectionTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LuxPageSectionTitle  $luxPageSectionTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(LuxPageSectionTitle $luxPageSectionTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLuxPageSectionTitleRequest  $request
     * @param  \App\Models\LuxPageSectionTitle  $luxPageSectionTitle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLuxPageSectionTitleRequest $request, LuxPageSectionTitle $luxPageSectionTitle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LuxPageSectionTitle  $luxPageSectionTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(LuxPageSectionTitle $luxPageSectionTitle)
    {
        //
    }
}
