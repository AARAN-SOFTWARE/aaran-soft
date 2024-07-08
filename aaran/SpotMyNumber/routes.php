<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('spotCustomer', App\Livewire\SportMyNumber\SportCustomer\Index::class)->name('spotCustomer');

});
