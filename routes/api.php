<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\SelectOption;
use App\Http\Controllers\File\FileController;
use App\Http\Controllers\HubController;
use App\Http\Controllers\HubandzonesController;
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

Route::resource('attachments', FileController::class);
Route::get('files/download/{uuid}', [FileController::class, 'download'])->name('files.download');
//Route::post('file', [FileController::class, 'uploadAttachment'])->middleware(['auth:sanctum']);

Route::group(['prefix' => 'admin'], static function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware(['auth:sanctum']);
    Route::get('user', [AuthController::class, 'user'])->name('auth.user')->middleware(['auth:sanctum']);
    Route::put('recover', [AuthController::class, 'recover'])->name('auth.recover');
    Route::put('reset', [AuthController::class, 'reset'])->name('auth.reset');
});

Route::group(['prefix' => 'rider'], static function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware(['auth:sanctum']);
    Route::get('user', [AuthController::class, 'user'])->name('auth.user')->middleware(['auth:sanctum']);
    Route::put('recover', [AuthController::class, 'recover'])->name('auth.recover');
    Route::put('reset', [AuthController::class, 'reset'])->name('auth.reset');
});

Route::group(['prefix' => 'auth'], static function () {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware(['auth:sanctum']);
    Route::get('user', [AuthController::class, 'user'])->name('auth.user')->middleware(['auth:sanctum']);
    Route::put('recover', [AuthController::class, 'recover'])->name('auth.recover');
    Route::put('reset', [AuthController::class, 'reset'])->name('auth.reset');
});

Route::group(['prefix' => 'admin'], static function () {
   Route::resource('dashboard ', DashboardController::class)->middleware(['auth:sanctum']);
   Route::resource('district', DistrictController::class)->middleware(['auth:sanctum']);
   Route::resource('zone', ZoneController::class)->middleware(['auth:sanctum']);
   Route::resource('area', AreaController::class)->middleware(['auth:sanctum']);
   Route::resource('producttype', ProductTypeController::class)->middleware(['auth:sanctum']);
   Route::resource('hub', HubController::class)->middleware(['auth:sanctum']);
   Route::resource('hubandzone', HubandzonesController::class)->middleware(['auth:sanctum']);
});
Route::resource('district', DistrictController::class)->only(['index', 'show']);
Route::resource('zone', ZoneController::class)->only(['index', 'show']);
Route::resource('area', AreaController::class)->only(['index', 'show']);
Route::resource('producttype', ProductTypeController::class)->only(['index', 'show']);

Route::get('user', [AuthController::class, 'user'])->middleware(['auth:sanctum']);
Route::get('selectoption', SelectOption::class)->name('selectoption');

require __DIR__.'/extra.php';