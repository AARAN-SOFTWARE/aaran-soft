<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/homeslides', App\Livewire\Webs\HomeSlide\Index::class)->name('homeslides');
    Route::get('/feed',App\Livewire\Webs\Feed\Index::class)->name('feed');
    Route::get('/feed/{id}/show',App\Livewire\Webs\Feed\Show::class)->name('show');
});
