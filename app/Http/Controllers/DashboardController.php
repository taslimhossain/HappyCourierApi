<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Helpers\ApiResponseTrait;
use Auth;

class DashboardController extends Controller
{
    use ApiResponseTrait;
    
    public function index()
    {

        // $user = Auth::user();
        
        // return $this->successResponse( $user );

        $deshboardData = array(
            "today_order"      => 50,
            "month_order"      => 400,
            "total_order"      => 5000,
            "pending_order"    => 50,
            "processing_order" => 50,
            "delivered_order"  => 50
        );

        return $this->successResponse($deshboardData);
    }
}
