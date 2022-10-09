<?php

namespace App\Http\Controllers;

use App\Models\Hub;
use App\Http\Requests\Hub\StoreHubRequest;
use App\Http\Requests\Hub\UpdateHubRequest;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Http\Resources\HubResource;

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
        $items = Hub::all();
        $responseData = HubResource::collection($items);
        return $this->successResponse($responseData);
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
        $request->validated();
        $area = new Hub();
        $area->name = $request->get('name');
        $area->status = $request->get('status');
        if($area->save()){
            return $this->successResponse( 'Data saved correctly', new HubResource($area) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function show(Hub $hub)
    {
        $responseData = new HubResource($hub);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function edit(Hub $hub)
    {
        $responseData = new HubResource($hub);
        return $this->successResponse($responseData);
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
        $request->validated();
        $hub->name = $request->get('name');
        $hub->status = $request->get('status');
        if ($hub->save()) {
            $responseData = new HubResource($hub);
            return $this->successResponse('Data updated correctly', $responseData);
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hub  $hub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hub $hub)
    {
        if ($hub->delete()) {
            $responseData = new HubResource($hub);
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
