<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use App\Http\Requests\StoreWeightRequest;
use App\Http\Requests\UpdateWeightRequest;

class WeightController extends Controller
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
     * @param  \App\Http\Requests\StoreWeightRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeightRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function show(Weight $weight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function edit(Weight $weight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWeightRequest  $request
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWeightRequest $request, Weight $weight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weight $weight)
    {
        //
    }
}
