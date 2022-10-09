<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use App\Http\Requests\Weight\StoreWeightRequest;
use App\Http\Requests\Weight\UpdateWeightRequest;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Http\Resources\WeightResource;

class WeightController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Weight::all();
        $responseData = WeightResource::collection($items);
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
     * @param  \App\Http\Requests\StoreWeightRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWeightRequest $request)
    {
        $request->validated();
        $item = new Weight();
        $item->from = $request->get('from');
        $item->to = $request->get('to');
        $item->amount = $request->get('amount');
        $item->status = $request->get('status');
        if($item->save()){
            return $this->successResponse( 'Data saved correctly', new WeightResource($item) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function show(Weight $weight)
    {
        $responseData = new WeightResource($weight);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function edit(Weight $weight)
    {
        $responseData = new WeightResource($weight);
        return $this->successResponse($responseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWeightRequest  $request
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWeightRequest $request, Weight $weight)
    {
        $request->validated();
        $weight->from = $request->get('from');
        $weight->to = $request->get('to');
        $weight->amount = $request->get('amount');
        $weight->status = $request->get('status');
        if ($weight->save()) {
            $responseData = new WeightResource($weight);
            return $this->successResponse('Data updated correctly', $responseData);
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weight  $weight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weight $weight)
    {
        if ($weight->delete()) {
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
