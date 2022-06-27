<?php

use Illuminate\Http\Response;

if (! function_exists('hitaslim')) {
    function hitaslim($date = '') {
        return 'hi taslim vai, ame global function';
    }
}

/**
* Build success response
* @param string|array $data
* @param int $code
* @return \Illuminate\Http\JsonResponse
*/

if (! function_exists('successResponse')) {
    function successResponse($data = null, $status_code = Response::HTTP_OK) {
        return response()->json([ 'status' => 'success', 'data' => $data], $status_code);
    }
}

/**
* Build error response
* @param string|array $data
* @param int $code
* @return \Illuminate\Http\JsonResponse
*/
if (! function_exists('errorResponse')) {
    function errorResponse( $message = null, $errors = [], $status_code = Response::HTTP_BAD_REQUEST) {

        $responseData = [];
        $responseData['status']  = 'fail';
        $responseData['message'] = $message;
        if($errors){
            $responseData['errors'] = $errors;
        }

        return response()->json($responseData, $status_code);
    }
}