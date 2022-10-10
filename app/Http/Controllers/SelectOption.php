<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Models\District;
use App\Models\Zone;
use App\Models\Area;
use App\Models\Hub;
use App\Models\Pickuplocation;
use App\Models\Weight;
use App\Models\Servicetype;
use App\Models\Producttype;

class SelectOption extends Controller
{
    use ApiResponseTrait;


    public function selectFormat($data = [])
    {
        $returnValue = array();
        if(isset($data) && is_array($data) || is_object($data)){
            foreach ($data as $key => $value) {
                $childItem = array();
                $childItem['id'] = $value->id;
                $childItem['name'] = $value->name;
                $returnValue[] = $childItem;
            }
        }
        return $returnValue;
    }

    public function selectWeight($data = [])
    {

        //dd($data);

        $returnValue = array();
        if(isset($data) && is_array($data) || is_object($data)){
            foreach ($data as $key => $value) {
                $childItem = array();
                $childItem['id'] = $value->id;
                $childItem['name'] = $value->from.' to '.$value->to;
                $returnValue[] = $childItem;
            }
        }
        return $returnValue;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $responseData = array();
        // start distric
        $district = District::where('status', '1')->get();
        $responseData['district'] = $this->selectFormat($district);
        
        // start zone
        $Zone = Zone::where('status', '1')->get();
        $responseData['zone'] = $this->selectFormat($Zone);
        
        // area zone
        $Area = Area::where('status', '1')->get();
        $responseData['area'] = $this->selectFormat($Area);
        
        // Hub
        $Hub = Hub::where('status', '1')->get();
        $responseData['hub'] = $this->selectFormat($Hub);
        
        //Pickuplocation 
        $PickupLocation = Pickuplocation::where('status', '1')->get();
        $responseData['pickuplocation'] = $this->selectFormat($PickupLocation);
        
        //Weight 
        $weight = Weight::where('status', '1')->get();
        $responseData['weight'] = $this->selectWeight($weight);
        
        //Weight 
        $servicetype = Servicetype::where('status', '1')->get();
        $responseData['servicetype'] = $this->selectFormat($servicetype);
        
        //Weight 
        $producttype = Producttype::where('status', '1')->get();
        $responseData['producttype'] = $this->selectFormat($producttype);

        return $this->successResponse($responseData);
    }
}
