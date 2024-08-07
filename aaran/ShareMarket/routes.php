<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('shareTrades', App\Livewire\Sundar\Trading\Index::class)->name('shareTrades');

});
