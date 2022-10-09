<?php

namespace App\Http\Controllers;

use App\Models\Producttype;
use App\Http\Resources\ProductTypeResource;
use App\Http\Requests\ProductType\StoreProductTypeRequest;
use App\Http\Requests\ProductType\UpdateProductTypeRequest;
use App\Http\Traits\Helpers\ApiResponseTrait;


class ProductTypeController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Producttype::all();
        $responseData = ProductTypeResource::collection($items);
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
     * @param  \App\Http\Requests\StoreProductTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeRequest $request)
    {
        $request->validated();
        $item = new Producttype();
        $item->name = $request->get('name');
        $item->amount = $request->get('amount');
        $item->status = $request->get('status');
        if($item->save()){
            return $this->successResponse( 'Data saved correctly', new ProductTypeResource($item) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(Producttype $producttype)
    {
        $responseData = new ProductTypeResource($producttype);
        return $this->successResponse($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(Producttype $producttype)
    {
        $responseData = new ProductTypeResource($producttype);
        return $this->successResponse($responseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductTypeRequest  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductTypeRequest $request, Producttype $producttype)
    {
        $request->validated();
        $producttype->name = $request->get('name');
        $producttype->amount = $request->get('amount');
        $producttype->status = $request->get('status');
        if($producttype->save()){
            return $this->successResponse( 'Data saved correctly', new ProductTypeResource($producttype) );
        }
        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producttype $producttype)
    {
        if ($producttype->delete()) {
            $responseData = new ProductTypeResource($producttype);
            return $this->successResponse('Data deleted successfully');
        }

        return $this->errorResponse('An error occurred while saving data', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}