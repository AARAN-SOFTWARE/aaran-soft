<?php

use Aaran\Entries\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/sales',function (){
    return Sale::all();
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
