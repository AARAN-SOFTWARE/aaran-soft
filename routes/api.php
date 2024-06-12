<?php

use Aaran\Entries\Models\Sale;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/sales',function (){
    return Sale::all();
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[ApiController::class,'register']);
Route::post('/login',[ApiController::class,'login']);

Route::get('/detail',[ApiController::class,'detail'])->middleware('auth:sanctum');
