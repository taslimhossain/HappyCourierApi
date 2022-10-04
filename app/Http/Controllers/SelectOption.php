<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Helpers\ApiResponseTrait;
use App\Models\District;
use App\Models\Zone;
use App\Models\Area;

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

        return $this->successResponse($responseData);
    }
}
