<?php

namespace App\Http\Controllers;

use App\Models\Servicetype;
use App\Http\Requests\Servicetype\StoreServicetypeRequest;
use App\Http\Requests\Servicetype\UpdateServicetypeRequest;
use App\Http\Resources\ServiceTypeResource;
use App\Http\Traits\Helpers\ApiResponseTrait;

class ServicetypeController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area = Servicetype::all();
        $responseData = ServiceTypeResource::collection($area);
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
     * @param  \App\Http\Requests\StoreServicetypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicetypeRequest $request)
    {
        $request->validated();
        $item = new Servicetype();
        $item->name   = $request->get('name');
        $item->amount = $request->get('amount');
        $item->status = $request->get('status');
        if($item->save()){
            return $this->successResponse( 'Data saved correctly', new ServiceTypeResource($item) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicetypes  $servicetypes
     * @return \Illuminate\Http\Response
     */
    public function show(Servicetype $servicetype)
    {
        $responseData = new ServiceTypeResource($servicetype);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicetypes  $servicetypes
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicetype $servicetype)
    {
        $responseData = new ServiceTypeResource($servicetype);
        return $this->successResponse($responseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServicetypesRequest  $request
     * @param  \App\Models\Servicetypes  $servicetypes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServicetypeRequest $request, Servicetype $servicetype)
    {
        $request->validated();
        $servicetype->name   = $request->get('name');
        $servicetype->amount = $request->get('amount');
        $servicetype->status = $request->get('status');
        if ($servicetype->save()) {
            $responseData = new ServiceTypeResource($servicetype);
            return $this->successResponse('Data updated correctly', $responseData);
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicetypes  $servicetypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicetype $servicetype)
    {
        if ($servicetype->delete()) {
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
