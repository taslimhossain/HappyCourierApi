<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DistrictController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/submit', function( Request $request ){
    return errorResponse('Sorry something wrong', Response::HTTP_PAYMENT_REQUIRED);
    //return successResponse(['Hello world']);
    //dd($request->all());
});

Route::get('db', [AuthController::class, 'db'])->name('db');

Route::group(['prefix' => 'auth'], static function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware(['auth:sanctum']);
    Route::get('user', [AuthController::class, 'user'])->name('auth.user')->middleware(['auth:sanctum']);
    Route::post('recover', [AuthController::class, 'recover'])->name('auth.recover');
    Route::post('reset', [AuthController::class, 'reset'])->name('auth.reset');
});

//Route::resource('district', DistrictController::class)->only(['create', 'store']);

// Route::resource('district', DistrictController::class);

Route::group(['prefix' => 'admin'], static function () {
   // Route::get('district', [DistrictController::class])->only('show')->middleware(['auth:sanctum']);
   Route::resource('district', DistrictController::class);
});



Route::get('user', [AuthController::class, 'user'])->middleware(['auth:sanctum']);