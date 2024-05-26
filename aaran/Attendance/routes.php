<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/attendances', App\Livewire\Attendance\Attendance\Index::class)->name('attendances');

});
