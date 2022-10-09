<?php

namespace App\Http\Controllers;

use App\Models\Pickuplocation;
use App\Http\Resources\PickuplocationResource;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Http\Requests\Pickuplocation\StorePickuplocationRequest;
use App\Http\Requests\Pickuplocation\UpdatePickuplocationRequest;
use Auth;

class PickuplocationController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pickuplocation::all();
        $responseData = PickuplocationResource::collection($items);
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
     * @param  \App\Http\Requests\StorePickuplocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePickuplocationRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $item = new Pickuplocation();
        $item->name        = $request->get('name');
        $item->address     = $request->get('address');
        $item->phone       = $request->get('phone');
        $item->email       = $request->get('email');
        $item->district_id = $request->get('district_id');
        $item->zone_id     = $request->get('zone_id');
        $item->area_id     = $request->get('area_id');
        $item->user_id     = $user->id;
        $item->status      = $request->get('status');
        if($item->save()){
            return $this->successResponse( 'Data saved correctly', new PickuplocationResource($item) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pickuplocation  $pickuplocation
     * @return \Illuminate\Http\Response
     */
    public function show(Pickuplocation $pickuplocation)
    {
        $responseData = new PickuplocationResource($pickuplocation);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pickuplocation  $pickuplocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Pickuplocation $pickuplocation)
    {
        $responseData = new PickuplocationResource($pickuplocation);
        return $this->successResponse($responseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePickuplocationRequest  $request
     * @param  \App\Models\Pickuplocation  $pickuplocation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePickuplocationRequest $request, Pickuplocation $pickuplocation)
    {
        $request->validated();
        $user = Auth::user();
        $pickuplocation->name        = $request->get('name');
        $pickuplocation->address     = $request->get('address');
        $pickuplocation->phone       = $request->get('phone');
        $pickuplocation->email       = $request->get('email');
        $pickuplocation->district_id = $request->get('district_id');
        $pickuplocation->zone_id     = $request->get('zone_id');
        $pickuplocation->area_id     = $request->get('area_id');
        $pickuplocation->user_id     = $user->id;
        $pickuplocation->status      = $request->get('status');
        if($pickuplocation->save()){
            return $this->successResponse( 'Data saved correctly', new PickuplocationResource($pickuplocation) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pickuplocation  $pickuplocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pickuplocation $pickuplocation)
    {
        if ($pickuplocation->delete()) {
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
