<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('creditBooks', App\Livewire\Sundar\Creditbook\Index::class)->name('creditBooks');
    Route::get('creditBooks/{id}/items', App\Livewire\Sundar\Creditbook\Item::class)->name('creditBooks.items');

    Route::get('interestBooks/{id}/show', App\Livewire\Sundar\InterestBook\Index::class)->name('interestBooks.show');

    Route::get('socials', App\Livewire\Sundar\Social\Index::class)->name('socials');

    Route::get('shareTrades', App\Livewire\Sundar\Trading\Index::class)->name('shareTrades');
    Route::get('shareTrades/deposits', App\Livewire\Sundar\Trading\Deposit::class)->name('shareTrades.deposits');
    Route::get('shareTrades/profits', App\Livewire\Sundar\Trading\Profit::class)->name('shareTrades.profits');
    Route::get('shareTrades/charges', App\Livewire\Sundar\Trading\Charges::class)->name('shareTrades.charges');


});
