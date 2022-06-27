<?php
namespace App\Http\Traits\Helpers;

use Illuminate\Http\Response;

trait ApiResponseTrait
{
    protected function successResponse($message = null, $data = null, $status_code = Response::HTTP_OK) {
        $responseData = [];
        $responseData['status']  = 'success';
        if($message){
            $responseData['message'] = $message;
        }

        if($data){
            $responseData['data'] = $data;
        } else {
            if(is_array($message) || is_object($message)){
                unset($responseData['message']);
                $responseData['data'] = $message;
            }
        }

        return response()->json($responseData, $status_code);
    }

    protected function errorResponse( $message = null, $errors = [], $status_code = Response::HTTP_BAD_REQUEST) {

        $responseData = [];
        $responseData['status']  = 'fail';
        $responseData['message'] = $message;
        if($errors){
            if(is_array($message) || is_object($message)){
                $responseData['errors'] = $errors;
            }
            if(is_int($errors)){
                $status_code = $errors;
            }
        } else {
            if(is_array($message) || is_object($message)){
                unset($responseData['message']);
                $responseData['errors'] = $message;
            }            
        }

        return response()->json($responseData, $status_code);
    }

}