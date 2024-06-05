<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('creditBooks', App\Livewire\Admin\Creditbook\Index::class)->name('creditBooks');
    Route::get('creditBooks/{id}/items', App\Livewire\Admin\Creditbook\Item::class)->name('creditBooks.items');

    Route::get('interestBooks/{id}/show', App\Livewire\Admin\InterestBook\Index::class)->name('interestBooks.show');

    Route::get('socials', App\Livewire\Admin\Social\Index::class)->name('socials');

    Route::get('shareTrades', App\Livewire\Admin\Trading\ShareTradeList::class)->name('shareTrades');


});
