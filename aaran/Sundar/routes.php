<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('credits', App\Livewire\Sundar\Credit\Cmember::class)->name('credits');
    Route::get('credits/{id}/books', App\Livewire\Sundar\Credit\Cbook::class)->name('credits.books');
    Route::get('credits/{id}/items', App\Livewire\Sundar\Credit\CbookItem::class)->name('credits.items');
    Route::get('credits/{id}/interests', App\Livewire\Sundar\Credit\CInterest::class)->name('credits.interests');




    Route::get('socials', App\Livewire\Sundar\Social\Index::class)->name('socials');

    Route::get('shareTrades', App\Livewire\Sundar\Trading\Index::class)->name('shareTrades');
    Route::get('shareTrades/investing', App\Livewire\Sundar\Trading\Investing::class)->name('shareTrades.investing');
    Route::get('shareTrades/deposits', App\Livewire\Sundar\Trading\Deposit::class)->name('shareTrades.deposits');
    Route::get('shareTrades/shares', App\Livewire\Sundar\Trading\Shares::class)->name('shareTrades.shares');
    Route::get('shareTrades/options', App\Livewire\Sundar\Trading\Options::class)->name('shareTrades.options');
    Route::get('shareTrades/charges', App\Livewire\Sundar\Trading\Charges::class)->name('shareTrades.charges');
    Route::get('shareTrades/openingBalance', App\Livewire\Sundar\Trading\OpeningBalance::class)->name('shareTrades.openingBalance');

    Route::get('shareTrades/{id}/stockDetails', App\Livewire\Sundar\Trading\sub\StockDetails::class)->name('shareTrades.stockDetails');
    Route::get('shareTrades/{id}/optionDetails', App\Livewire\Sundar\Trading\sub\OptionDetails::class)->name('shareTrades.optionDetails');
    Route::get('shareTrades/{id}/commissions', App\Livewire\Sundar\Trading\sub\CommissionDetails::class)->name('shareTrades.commissions');

    Route::get('shareTrades/summary', App\Livewire\Sundar\Trading\ShareSummary::class)->name('shareTrades.summary');


});
