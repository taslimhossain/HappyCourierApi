<?php

namespace App\Http\Controllers;

use App\Models\Ridercost;
use App\Http\Resources\RidercostResource;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Http\Requests\Ridercost\StoreRidercostRequest;
use App\Http\Requests\Ridercost\UpdateRidercostRequest;

class RidercostController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Ridercost::all();
        $responseData = RidercostResource::collection($items);
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
     * @param  \App\Http\Requests\StoreRidercostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRidercostRequest $request)
    {
        $request->validated();
        $item = new Ridercost();
        $item->name            = $request->get('name');
        $item->pickup_amount   = $request->get('pickup_amount');
        $item->delivery_amount = $request->get('delivery_amount');
        $item->sallery_amount  = $request->get('sallery_amount');
        $item->ridertype       = $request->get('ridertype');
        $item->status          = $request->get('status');
        if($item->save()){
            return $this->successResponse( 'Data saved correctly', new RidercostResource($item) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ridercost  $ridercost
     * @return \Illuminate\Http\Response
     */
    public function show(Ridercost $ridercost)
    {
        $responseData = new RidercostResource($ridercost);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ridercost  $ridercost
     * @return \Illuminate\Http\Response
     */
    public function edit(Ridercost $ridercost)
    {
        $responseData = new RidercostResource($ridercost);
        return $this->successResponse($responseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRidercostRequest  $request
     * @param  \App\Models\Ridercost  $ridercost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRidercostRequest $request, Ridercost $ridercost)
    {
        $request->validated();
        $ridercost->name            = $request->get('name');
        $ridercost->pickup_amount   = $request->get('pickup_amount');
        $ridercost->delivery_amount = $request->get('delivery_amount');
        $ridercost->sallery_amount  = $request->get('sallery_amount');
        $ridercost->ridertype       = $request->get('ridertype');
        $ridercost->status          = $request->get('status');
        if($ridercost->save()){
            return $this->successResponse( 'Data saved correctly', new RidercostResource($ridercost) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ridercost  $ridercost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ridercost $ridercost)
    {
        if ($ridercost->delete()) {
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
