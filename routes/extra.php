<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExtraController;


Route::get('category', [ExtraController::class, 'category']);
Route::get('products', [ExtraController::class, 'products']);
Route::get('orders', [ExtraController::class, 'orders']);
Route::get('coupon', [ExtraController::class, 'coupon']);

Route::group(['prefix' => 'admin/rider'], static function () {
    Route::post('getallrider', [ExtraController::class, 'getallrider']);
 });

Route::group(['prefix' => 'admin/merchants'], static function () {
    Route::get('getallmerchants', [ExtraController::class, 'getallmerchants']);
});


