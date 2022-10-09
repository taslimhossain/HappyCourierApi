<?php

namespace App\Http\Controllers;

use App\Models\Pickuplocation;
use App\Http\Requests\StorePickuplocationRequest;
use App\Http\Requests\UpdatePickuplocationRequest;

class PickuplocationController extends Controller
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
     * @param  \App\Http\Requests\StorePickuplocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePickuplocationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pickuplocation  $pickuplocation
     * @return \Illuminate\Http\Response
     */
    public function show(Pickuplocation $pickuplocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pickuplocation  $pickuplocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Pickuplocation $pickuplocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePickuplocationRequest  $request
     * @param  \App\Models\Pickuplocation  $pickuplocation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePickuplocationRequest $request, Pickuplocation $pickuplocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pickuplocation  $pickuplocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pickuplocation $pickuplocation)
    {
        //
    }
}
