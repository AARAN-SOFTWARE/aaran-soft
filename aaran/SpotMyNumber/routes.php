<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('spotCustomer', App\Livewire\SpotMyNumber\SpotCustomer\Index::class)->name('spotCustomer');

    Route::get('spotCustomer/upsert', App\Livewire\SpotMyNumber\SpotCustomer\Upsert::class)->name('spotCustomer.upsert');
    Route::get('spotCustomer/{id}/pic', App\Livewire\SpotMyNumber\SpotPicks\Index::class)->name('spotCustomer.pic');
    Route::get('spotCustomer/{id}/bios', App\Livewire\SpotMyNumber\SpotBios\Index::class)->name('spotCustomer.bios');
    Route::get('spotCustomer/{id}/category', App\Livewire\SpotMyNumber\SpotCategory\Index::class)->name('spotCustomer.category');

    Route::get('spotList', App\Livewire\SpotMyNumber\SpotList\Index::class)->name('spotList');

});
