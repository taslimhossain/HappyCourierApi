<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use App\Http\Requests\StoreHubRequest;
use App\Http\Requests\UpdateHubRequest;
use App\Http\Traits\Helpers\ApiResponseTrait;

class HubController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->successResponse('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHubRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHubRequest $request)
    {
        return $this->successResponse('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function show(Hub $hub)
    {
        return $this->successResponse('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function edit(Hub $hub)
    {
        return $this->successResponse('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHubRequest  $request
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHubRequest $request, Hub $hub)
    {
        return $this->successResponse('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hub $hub)
    {
        return $this->successResponse('destroy');
    }
}
