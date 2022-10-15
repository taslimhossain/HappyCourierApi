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
        $zone_id        = $request->get('zone_id');
        $product_typeid = $request->get('product_typeid');
        $service_id     = $request->get('service_id');
        $weight_id      = $request->get('weight_id');
        //dd('df');
        
        $delivery_fee = 0;
        $district_price = 0;
        $wight_price = 0;
        $product_type_price = 0;
        $service_type_price = 0;
        $is_samecity = false;

        // weight calculator
        $weight_inside_amount = 0;
        $weight_inside_district = 0;
        $weight_outside_amount = 0;
        if($weight_id){
            $weight = Weight::where('id', $weight_id)->first();
            if($weight){
                $weight_inside_amount = $weight->inside_amount;
                $weight_inside_district = $weight->inside_district;
                $weight_outside_amount = $weight->outside_amount;
            }
        }



        // checking is it same destrict or different
        if($store_id){
            $store = Pickuplocation::where('id', $store_id)->first();
            $storeDistrict = District::where('id', $store->district_id)->first();
            if($storeDistrict){
                if((int) $store->district_id === (int) $district_id){
                    $district_price = $storeDistrict->samedistrict;
                    $wight_price = $weight_inside_district;
                        if($zone_id){
                            $zone = Zone::where('id', $zone_id)->first();
                            if( $zone ){
                                $zone_district = $zone->district_id;
                                if( (int) $zone_district === (int) $district_id && (bool) $zone->is_insidecity === true ){
                                    $district_price = $storeDistrict->insidecity;
                                    $wight_price = $weight_inside_amount;
                                }
                            }
                        }
                } else {
                    $district_price = $storeDistrict->outside;
                    $wight_price = $weight_outside_amount;
                }
            }
        }

        if($product_typeid){
            $producttype = Producttype::where('id', $product_typeid)->first();
            if($producttype){
                $product_type_price = $producttype->amount;
            }
        }

        if($service_id){
            $servicetype = Servicetype::where('id', $service_id)->first();
            if($servicetype){
                $service_type_price = $servicetype->amount;
            }
        }



        // if($district_id){


        //     $district = District::where('id', $district_id)->first();
        //     $district_price = $district->outside;
      
        //     if($zone_id){
        //         $zone = Zone::where('id', $zone_id)->first();
        //         if($district->id === $zone->district_id){
        //             $district_price = $district->samedistrict;
        //         }
        //         if($district->id === $zone->district_id || $zone->is_insidecity === 1){
        //             $district_price = $district->insidecity;
        //         }
        //     }
            
        //     $delivery_fee += $district_price;
        // }


        $delivery_fee += $district_price+$wight_price+$product_type_price+$service_type_price;

        // $number1 = rand(1,40);
        // $number2 = rand(40,100);
        $responseData = [
            'delivery_fee'       => $delivery_fee,
            'wight_price'        => $wight_price,
            'product_type_price' => $product_type_price,
            'service_type_price' => $service_type_price,
            'discount'           => 0,
            'additional_charge'  => 0,
            'total_cost'         => $delivery_fee
        ];
        return $this->successResponse($responseData);
    }
}
