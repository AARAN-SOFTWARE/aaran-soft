<?php

use Illuminate\Support\Facades\Route;

//master
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/receviables', App\Livewire\Reports\Statement\Receivables::class)->name('receviables');
    Route::get('/receviables/print/{party}/{start_date?}/{end_date?}', App\Http\Controllers\Entries\SalesReport\ReportController::class)->name('receviables.print');

    Route::get('/payables', App\Livewire\Reports\Statement\Payables::class)->name('payables');
    Route::get('/payables/print/{party}/{start_date?}/{end_date?}', App\Http\Controllers\Entries\PurchaseReport\PayablesReportController::class)->name('payables.print');

    Route::get('/sales-reports', App\Livewire\Master\Company\Index::class)->name('sales-reports');

    Route::get('/purchase-reports', App\Livewire\Master\Company\Index::class)->name('purchase-reports');

    Route::get('/gst-reports', App\Livewire\Master\Company\Index::class)->name('gst-reports');

});
