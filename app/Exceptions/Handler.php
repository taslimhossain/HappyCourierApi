<?php

namespace App\Exceptions;

use App\Http\Traits\Helpers\ApiResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponseTrait;
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        /**
         * ValidationException
         */
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return $this->errorResponse($exception->getMessage(), $exception->errors(), $exception->status);
        }
        
        /**
         * NotFoundHttpException
         */
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return $this->errorResponse('No Route Found', Response::HTTP_NOT_FOUND );
        }
        
        /**
         * QueryException
         */
        if ($exception instanceof \Illuminate\Database\QueryException) {
            return $this->errorResponse('There was Issue with the Query', Response::HTTP_INTERNAL_SERVER_ERROR );
        }
        
        /**
         * ThrottleRequestsException
         */
        if ($exception instanceof \Illuminate\Http\Exceptions\ThrottleRequestsException) {
            return $this->errorResponse('Too Many Requests,Please Slow Down', Response::HTTP_TOO_MANY_REQUESTS );
        }
        
        /**
         * AuthenticationException
         */
        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
            return $this->errorResponse('Unauthenticated or Token Expired, Please Login',Response::HTTP_UNAUTHORIZED );
        }
    
        /**
         * NotFoundHttpException
         */
        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            return $this->errorResponse('Sorry data not found!',Response::HTTP_NOT_FOUND );
        }
    
        /**
         * Error
         */
        // if ($exception instanceof \Error) {
        //     return errorResponse('There was some internal error', Response::HTTP_INTERNAL_SERVER_ERROR);
        // }

        return parent::render($request, $exception);
    }


}
