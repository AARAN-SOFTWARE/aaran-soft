<?php

use Illuminate\Support\Facades\Route;

//Audit
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('clients', App\Livewire\Audit\Client\Index::class)->name('clients');
    Route::get('clients/{id}/show', App\Livewire\Audit\Client\Show::class)->name('clients.show');

    Route::get('gstFilings', App\Livewire\Audit\GstFiling\Index::class)->name('gstFilings');

    Route::get('clientFees', App\Livewire\Audit\ClientFee\Index::class)->name('clientFees');

    Route::get('clientBanks', App\Livewire\Audit\ClientBank\Index::class)->name('clientBanks');
    Route::get('clientBanks/{id}/show', App\Livewire\Audit\ClientBank\Show::class)->name('clientBanks.show');

    Route::get('clientBankBalances', App\Livewire\Audit\ClientBank\Balance::class)->name('clientBankBalances');

    Route::get('smonth', \App\Livewire\Audit\SalesTrack\Common\SmonthList::class)->name('smonth');
    Route::get('vehicle', \App\Livewire\Audit\SalesTrack\Common\Vehicle\Index::class)->name('vehicle');

    Route::get('sales-track', \App\Livewire\Audit\SalesTrack\Common\Track\Index::class)->name('sales-track');
    Route::get('sales-track/{id}/items', \App\Livewire\Audit\SalesTrack\Common\Track\Items::class)->name('sales-track.items');

    Route::get('salesTracks', \App\Livewire\Audit\SalesTrack\SalesTrack\Index::class)->name('salesTracks');
    Route::get('salesTracks/{id}/items', \App\Livewire\Audit\SalesTrack\SalesTrack\Items::class)->name('salesTracks.items');

    Route::get('salesTracks/{id}/Bills', App\Livewire\Audit\SalesTrack\Bills\Index::class)->name('salesTracks.Bills');
    Route::get('salesTracks/{id}/billItems', App\Livewire\Audit\SalesTrack\Bills\Items::class)->name('salesTracks.billItems');

    Route::get('trackReport', \App\Livewire\Audit\SalesTrack\Report\SalesBillReport::class)->name('trackReport');

    Route::get('discourse', App\Livewire\Audit\Discourse\Index::class)->name('discourse');
    Route::get('discourses{id}show', App\Livewire\Audit\Discourse\Show::class)->name('discourse.show');


    Route::get('payment-slip', App\Livewire\Audit\PaymentSlip\Index::class)->name('payment-slip');
});
