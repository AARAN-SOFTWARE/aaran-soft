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
Route::get('/gst',[\App\Http\Controllers\Gst\masterGst::class,'authenticate']);
Route::get('/details',[\App\Http\Controllers\Gst\masterGst::class,'gstDetails']);
Route::get('/irn',[\App\Http\Controllers\Gst\masterGst::class,'getIrn']);
Route::get('/irn-cancel',[\App\Http\Controllers\Gst\masterGst::class,'getIrnCancel']);
Route::get('/ewayBill',[\App\Http\Controllers\Gst\masterGst::class,'getEwayBill']);
Route::get('/ewayDetails',[\App\Http\Controllers\Gst\masterGst::class,'getEwayDetails']);


Route::get('user/{id}', [ApiController::class, 'user']);
Route::get('users', [ApiController::class, 'users']);

Route::post('/register',[ApiController::class,'register']);
Route::post('/login',[ApiController::class,'login']);

Route::get('/detail',[ApiController::class,'detail'])->middleware('auth:sanctum');


Route::post('/entery',[\App\Http\Controllers\EnteryController::class,'createEntry'])->middleware('auth:sanctum');
