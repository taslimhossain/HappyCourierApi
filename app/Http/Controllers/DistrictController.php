<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Http\Requests\District\StoreDistrictRequest;
use App\Http\Requests\District\UpdateDistrictRequest;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Http\Resources\DistrictResource;

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
        $responseData = ['district' => DistrictResource::collection($district)];
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ['hello create'];
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
        $district->save();
        
        return $this->successResponse( new DistrictResource($district) );
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
        return ['hello edit'];
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
        return ['hello update'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        return ['hello delete'];
    }
}
