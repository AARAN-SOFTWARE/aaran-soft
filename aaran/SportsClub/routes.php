<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('sportsClub', App\Livewire\Sports\Club\Index::class)->name('sportsClub');

});
