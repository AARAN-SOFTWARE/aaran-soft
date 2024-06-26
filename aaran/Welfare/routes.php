<?php

use Illuminate\Support\Facades\Route;

//master
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/welfare', App\Livewire\Taskmanager\Todos\Index::class)->name('welfare');

});
