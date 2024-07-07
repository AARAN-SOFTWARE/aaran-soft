<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('credits', App\Livewire\Sundar\Credit\Cmember::class)->name('credits');

});
