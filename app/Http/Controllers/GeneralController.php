<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Http\Requests\StoreGeneralRequest;
use App\Http\Requests\UpdateGeneralRequest;

class GeneralController extends Controller
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
     * @param  \App\Http\Requests\StoreGeneralRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGeneralRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function show(General $general)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function edit(General $general)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGeneralRequest  $request
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGeneralRequest $request, General $general)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function destroy(General $general)
    {
        //
    }
}
