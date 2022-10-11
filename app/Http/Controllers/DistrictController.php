<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Http\Requests\District\StoreDistrictRequest;
use App\Http\Requests\District\UpdateDistrictRequest;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Http\Resources\DistrictResource;
use Illuminate\Http\Response;

class DistrictController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $district = District::all();
        $responseData = DistrictResource::collection($district);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ['District create'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\District\StoreDistrictRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistrictRequest $request)
    {
        $request->validated();
        $district = new District();
        $district->name = $request->get('name');
        $district->insidecity = $request->get('insidecity');
        $district->samedistrict = $request->get('samedistrict');
        $district->outside = $request->get('outside');
        $district->status = $request->get('status');
        if($district->save()){
            return $this->successResponse( 'Data saved correctly', new DistrictResource($district) );
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        $responseData = new DistrictResource($district);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $responseData = new DistrictResource($district);
        return $this->successResponse($responseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\District\UpdateDistrictRequest  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDistrictRequest $request, District $district)
    {

        $request->validated();
        $district->name = $request->get('name');
        $district->insidecity = $request->get('insidecity');
        $district->samedistrict = $request->get('samedistrict');
        $district->outside = $request->get('outside');
        $district->status = $request->get('status');
        if ($district->save()) {
            $responseData = new DistrictResource($district);
            return $this->successResponse('Data updated correctly', $responseData);
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {

        if ($district->delete()) {
            $responseData = new DistrictResource($district);
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
