<?php

namespace App\Http\Controllers;

use App\Models\Merchantcost;
use App\Http\Resources\MerchantcostResource;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Http\Requests\Merchantcost\StoreMerchantcostRequest;
use App\Http\Requests\Merchantcost\UpdateMerchantcostRequest;

class MerchantcostController extends Controller
{

    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Merchantcost::all();
        $responseData = MerchantcostResource::collection($items);
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
     * @param  \App\Http\Requests\StoreMerchantcostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchantcostRequest $request)
    {
        $request->validated();
        $item = new Merchantcost();
        $item->name            = $request->get('name');
        $item->pickup_amount   = $request->get('pickup_amount');
        $item->delivery_amount = $request->get('delivery_amount');
        $item->discount_amount  = $request->get('discount_amount');
        $item->status          = $request->get('status');
        if($item->save()){
            return $this->successResponse( 'Data saved correctly', new MerchantcostResource($item) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchantcost  $merchantcost
     * @return \Illuminate\Http\Response
     */
    public function show(Merchantcost $merchantcost)
    {
        $responseData = new MerchantcostResource($merchantcost);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchantcost  $merchantcost
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchantcost $merchantcost)
    {
        $responseData = new MerchantcostResource($merchantcost);
        return $this->successResponse($responseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerchantcostRequest  $request
     * @param  \App\Models\Merchantcost  $merchantcost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchantcostRequest $request, Merchantcost $merchantcost)
    {
        $request->validated();
        $merchantcost->name            = $request->get('name');
        $merchantcost->pickup_amount   = $request->get('pickup_amount');
        $merchantcost->delivery_amount = $request->get('delivery_amount');
        $merchantcost->discount_amount  = $request->get('discount_amount');
        $merchantcost->status          = $request->get('status');
        if($merchantcost->save()){
            return $this->successResponse( 'Data saved correctly', new MerchantcostResource($merchantcost) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchantcost  $merchantcost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchantcost $merchantcost)
    {
        if ($merchantcost->delete()) {
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
