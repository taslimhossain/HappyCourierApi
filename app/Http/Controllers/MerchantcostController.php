<?php

namespace App\Http\Controllers;

use App\Models\Merchantcost;
use App\Http\Requests\StoreMerchantcostRequest;
use App\Http\Requests\UpdateMerchantcostRequest;

class MerchantcostController extends Controller
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
     * @param  \App\Http\Requests\StoreMerchantcostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchantcostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchantcost  $merchantcost
     * @return \Illuminate\Http\Response
     */
    public function show(Merchantcost $merchantcost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchantcost  $merchantcost
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchantcost $merchantcost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerchantcostRequest  $request
     * @param  \App\Models\Merchantcost  $merchantcost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchantcostRequest $request, Merchantcost $merchantcost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchantcost  $merchantcost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchantcost $merchantcost)
    {
        //
    }
}
