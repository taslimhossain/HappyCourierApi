<?php

namespace App\Http\Controllers;

use App\Models\Servicetypes;
use App\Http\Requests\StoreServicetypesRequest;
use App\Http\Requests\UpdateServicetypesRequest;

class ServicetypesController extends Controller
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
     * @param  \App\Http\Requests\StoreServicetypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicetypesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicetypes  $servicetypes
     * @return \Illuminate\Http\Response
     */
    public function show(Servicetypes $servicetypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicetypes  $servicetypes
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicetypes $servicetypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServicetypesRequest  $request
     * @param  \App\Models\Servicetypes  $servicetypes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServicetypesRequest $request, Servicetypes $servicetypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicetypes  $servicetypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicetypes $servicetypes)
    {
        //
    }
}
