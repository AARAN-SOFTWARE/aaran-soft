<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('creditBooks', App\Livewire\Sundar\Creditbook\Index::class)->name('creditBooks');
    Route::get('creditBooks/{id}/items', App\Livewire\Sundar\Creditbook\Item::class)->name('creditBooks.items');

    Route::get('interestBooks/{id}/show', App\Livewire\Sundar\InterestBook\Index::class)->name('interestBooks.show');

    Route::get('socials', App\Livewire\Sundar\Social\Index::class)->name('socials');

    Route::get('shareTrades', App\Livewire\Sundar\Trading\ShareTradeList::class)->name('shareTrades');


});
