<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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


Route::get("products" ,[ApiController::class,'Get_Products']);
Route::get("Products_Count" ,[ApiController::class,'Product_Count']);

Route::get("Deleted_Products" ,[ApiController::class,'Get_Deleted']);
Route::get("Deleted_Count" ,[ApiController::class,'Deleted_Count']);


Route::delete("product/delete/{id}" ,[ApiController::class,'destroy']);

Route::delete("product/delete/{id}/{id2}" ,[ApiController::class,'Multiple_destroy']);



Route::get("report",[ApiController::class,'Report']);



