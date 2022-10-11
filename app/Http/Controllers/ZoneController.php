<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use App\Http\Requests\Zone\StoreZoneRequest;
use App\Http\Requests\Zone\UpdateZoneRequest;
use App\Http\Resources\ZoneResource;
use App\Http\Traits\Helpers\ApiResponseTrait;


class ZoneController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zone = Zone::all();
        $responseData = ZoneResource::collection($zone);
        if($responseData){
            return $this->successResponse($responseData);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ['Zone create'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreZoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZoneRequest $request)
    {
        $request->validated();
        $district = new Zone();
        $district->name = $request->get('name');
        $district->district_id = $request->get('district_id');
        $district->is_insidecity = $request->get('is_insidecity');
        $district->pickup_accept = $request->get('pickup_accept');
        $district->delivery_accept = $request->get('delivery_accept');
        $district->status = $request->get('status');
        if($district->save()){
            return $this->successResponse( 'Data saved correctly', new ZoneResource($district) );
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        $responseData = new ZoneResource($zone);
        
        
       // $responseData->district_name = $district->name;
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        $responseData = new ZoneResource($zone);
        
        return $this->successResponse($zone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateZoneRequest  $request
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateZoneRequest $request, Zone $zone)
    {
        $request->validated();
        $zone->name = $request->get('name');
        $zone->district_id = $request->get('district_id');
        $zone->is_insidecity = $request->get('is_insidecity');
        $zone->pickup_accept = $request->get('pickup_accept');
        $zone->delivery_accept = $request->get('delivery_accept');
        $zone->status = $request->get('status');
        if ($zone->save()) {
            $responseData = new ZoneResource($zone);
            return $this->successResponse('Data updated correctly', $responseData);
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
        if ($zone->delete()) {
            $responseData = new ZoneResource($zone);
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
