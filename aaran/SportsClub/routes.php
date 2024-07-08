<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('sportsclub', App\Livewire\Sports\SportsClub\Index::class)->name('sportsclub');

});
