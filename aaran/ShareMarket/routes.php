<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('shares', App\Livewire\ShareMarket\Index::class)->name('shares');

    Route::get('shares/{id}/details', App\Livewire\ShareMarket\Upsert::class)->name('shares.details');

});
