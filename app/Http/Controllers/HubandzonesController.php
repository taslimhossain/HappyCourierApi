<?php

namespace App\Http\Controllers;

use App\Models\Hubandzones;
use App\Http\Requests\Hubandzone\StoreHubandzoneRequest;
use App\Http\Requests\Hubandzone\UpdateHubandzoneRequest;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Http\Resources\HubandZoneResource;
use App\Models\Hubandzone;

class HubandzonesController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Hubandzone::all();
        $responseData = HubandZoneResource::collection($items);
        return $this->successResponse($responseData);
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
     * @param  \App\Http\Requests\StoreHubandzonesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHubandzoneRequest $request)
    {
        $request->validated();
        $item = new Hubandzone();
        $item->zone_id = $request->get('zone_id');
        $item->hub_id = $request->get('hub_id');
        if($item->save()){
            return $this->successResponse( 'Data saved correctly', new HubandZoneResource($item) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hubandzones  $hubandzones
     * @return \Illuminate\Http\Response
     */
    public function show(Hubandzone $hubandzone)
    {
        $responseData = new HubandZoneResource($hubandzone);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hubandzones  $hubandzones
     * @return \Illuminate\Http\Response
     */
    public function edit(Hubandzone $hubandzone)
    {
        $responseData = new HubandZoneResource($hubandzone);
        return $this->successResponse($responseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHubandzonesRequest  $request
     * @param  \App\Models\Hubandzones  $hubandzones
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHubandzoneRequest $request, Hubandzone $hubandzone)
    {
        $request->validated();
        $hubandzone->zone_id = $request->get('zone_id');
        $hubandzone->hub_id = $request->get('hub_id');
        if ($hubandzone->save()) {
            $responseData = new HubandZoneResource($hubandzone);
            return $this->successResponse('Data updated correctly', $responseData);
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hubandzone  $hubandzones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hubandzone $hubandzone)
    {
        if ($hubandzone->delete()) {
            $responseData = new HubandZoneResource($hubandzone);
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
