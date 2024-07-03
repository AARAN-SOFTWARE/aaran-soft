<?php

use Illuminate\Support\Facades\Route;

//master
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/segment', App\Livewire\Welfare\Segment\Index::class)->name('segment');
    Route::get('/welfareProduct', App\Livewire\Welfare\Products\Index::class)->name('welfareProduct');
    Route::get('/welfareProject', App\Livewire\Welfare\Project\Index::class)->name('welfareProject');

});
