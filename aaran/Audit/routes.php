<?php

use Illuminate\Support\Facades\Route;

//audit
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('clients', App\Livewire\Audit\Client\Index::class)->name('clients');
    Route::get('clients/{id}/show', App\Livewire\Audit\Client\Show::class)->name('clients.show');

    Route::get('gstFilings', App\Livewire\Audit\GstFiling\Index::class)->name('gstFilings');

    Route::get('clientFees', App\Livewire\Audit\ClientFee\Index::class)->name('clientFees');
    Route::get('clientFees/{id}/report', App\Livewire\Audit\ClientFee\Report::class)->name('clientFees.report');

    Route::get('clientBanks', App\Livewire\Audit\ClientBank\Index::class)->name('clientBanks');
    Route::get('clientBanks/{id}/show', App\Livewire\Audit\ClientBank\Show::class)->name('clientBanks.show');

    Route::get('clientBankBalances', App\Livewire\Audit\ClientBank\Balance::class)->name('clientBankBalances');

    Route::get('smonth', \App\Livewire\Audit\SalesTrack\Common\SmonthList::class)->name('smonth');
    Route::get('vehicle', \App\Livewire\Audit\SalesTrack\Common\Vehicle\Index::class)->name('vehicle');

    Route::get('rootlines', \App\Livewire\Audit\SalesTrack\Rootline\Index::class)->name('rootlines');
    Route::get('rootlines/{id}/items', \App\Livewire\Audit\SalesTrack\Rootline\Items::class)->name('rootlines.items');

    Route::get('salesTracks', \App\Livewire\Audit\SalesTrack\Track\Index::class)->name('salesTracks');
    Route::get('salesTracks/{id}/items', \App\Livewire\Audit\SalesTrack\Track\Items::class)->name('salesTracks.items');

    Route::get('salesTracks/{id}/Bills', App\Livewire\Audit\SalesTrack\Bills\Index::class)->name('salesTracks.Bills');
    Route::get('salesTracks/{id}/billItems', App\Livewire\Audit\SalesTrack\Bills\Items::class)->name('salesTracks.billItems');
    Route::get('salesTracks/{id}/upsert', App\Livewire\Audit\SalesTrack\Bills\Upsert::class)->name('salesTracks.upsert');

    Route::get('trackReport', \App\Livewire\Audit\SalesTrack\Report\SalesBillReport::class)->name('trackReport');

    Route::get('discourse', App\Livewire\Audit\Discourse\Index::class)->name('discourse');
    Route::get('discourses{id}show', App\Livewire\Audit\Discourse\Show::class)->name('discourse.show');


    Route::get('payment-slip', App\Livewire\Audit\PaymentSlip\Index::class)->name('payment-slip');
});
