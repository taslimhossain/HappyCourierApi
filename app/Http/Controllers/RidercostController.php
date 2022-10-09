<?php

namespace App\Http\Controllers;

use App\Models\Ridercost;
use App\Http\Requests\StoreRidercostRequest;
use App\Http\Requests\UpdateRidercostRequest;

class RidercostController extends Controller
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
     * @param  \App\Http\Requests\StoreRidercostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRidercostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ridercost  $ridercost
     * @return \Illuminate\Http\Response
     */
    public function show(Ridercost $ridercost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ridercost  $ridercost
     * @return \Illuminate\Http\Response
     */
    public function edit(Ridercost $ridercost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRidercostRequest  $request
     * @param  \App\Models\Ridercost  $ridercost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRidercostRequest $request, Ridercost $ridercost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ridercost  $ridercost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ridercost $ridercost)
    {
        //
    }
}
