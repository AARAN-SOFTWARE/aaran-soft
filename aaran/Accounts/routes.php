<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('cashbooks', App\Livewire\Accounts\Cashbook\Index::class)->name('cashbooks');

});
