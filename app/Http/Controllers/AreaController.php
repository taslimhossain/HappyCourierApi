<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Resources\AreaResource;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Http\Requests\Area\StoreAreaRequest;
use App\Http\Requests\Area\UpdateAreaRequest;
use App\Http\Resources\DistrictResource;

class AreaController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area = Area::all();
        $responseData = AreaResource::collection($area);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ['Area create'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAreaRequest $request)
    {
        $request->validated();
        $area = new Area();
        $area->name = $request->get('name');
        $area->zone_id = $request->get('zone_id');
        $area->pickup_accept = $request->get('pickup_accept');
        $area->delivery_accept = $request->get('delivery_accept');
        $area->status = $request->get('status');
        if($area->save()){
            return $this->successResponse( 'Data saved correctly', new DistrictResource($area) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        $responseData = new AreaResource($area);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $responseData = new AreaResource($area);
        return $this->successResponse($responseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAreaRequest  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreaRequest $request, Area $area)
    {
        $request->validated();
        $area->name = $request->get('name');
        $area->zone_id = $request->get('zone_id');
        $area->pickup_accept = $request->get('pickup_accept');
        $area->delivery_accept = $request->get('delivery_accept');
        $area->status = $request->get('status');
        if ($area->save()) {
            $responseData = new areaResource($area);
            return $this->successResponse('Data updated correctly', $responseData);
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        if ($area->delete()) {
            $responseData = new DistrictResource($area);
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
