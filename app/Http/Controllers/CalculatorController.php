<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Zone;
use App\Models\Area;
use App\Models\Hub;
use App\Models\Pickuplocation;
use App\Models\Weight;
use App\Models\Servicetype;
use App\Models\Producttype;


use App\Http\Traits\Helpers\ApiResponseTrait;

class CalculatorController extends Controller
{
    use ApiResponseTrait;



    public function orderCalculator( Request $request)
    {
        //dd($request);
        $store_id       = $request->get('store_id');
        $district_id    = $request->get('district_id');
        $product_typeid = $request->get('product_typeid');
        $service_id     = $request->get('service_id');
        $weight_id      = $request->get('weight_id');
        $zone_id        = $request->get('zone_id');
        //dd('df');
        
        $delivery_fee = 0;
        $district_price = 0;


        

        if($store_id){
            $store = Pickuplocation::where('id', $store_id)->firstOrFail();
            $districtZone = District::where('id', $store->district_id)->firstOrFail();

            if($districtZone){
                if($store->district_id == $district_id){
                    $district_price = $districtZone->samedistrict;

                } else {
                    $district_price = $districtZone->outside;
                }
            }
    
        }









        // if($district_id){


        //     $district = District::where('id', $district_id)->firstOrFail();
        //     $district_price = $district->outside;
      
        //     if($zone_id){
        //         $zone = Zone::where('id', $zone_id)->firstOrFail();
        //         if($district->id === $zone->district_id){
        //             $district_price = $district->samedistrict;
        //         }
        //         if($district->id === $zone->district_id || $zone->is_insidecity === 1){
        //             $district_price = $district->insidecity;
        //         }
        //     }
            
        //     $delivery_fee += $district_price;
        // }



        $delivery_fee += $district_price;

        

        $number1 = rand(1,40);
        $number2 = rand(40,100);
        $responseData = [
            'delivery_fee'      => $delivery_fee,
            'discount'          => 0,
            'additional_charge' => $number1,
            'total_cost' => $number1 + $number2
        ];
        return $this->successResponse($responseData);
    }
}
