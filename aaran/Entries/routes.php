<?php

use Illuminate\Support\Facades\Route;

//Entries
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/sales', App\Livewire\Entries\Sales\Index::class)->name('sales');
    Route::get('/sales/{id}/upsert', App\Livewire\Entries\Sales\Upsert::class)->name('sales.upsert');
    Route::get('/sales/{id}/print', App\Http\Controllers\Entries\Sales\InvoiceController::class)->name('sales.print');

    Route::get('/purchases', App\Livewire\Entries\Purchase\Index::class)->name('purchases');
    Route::get('/purchases/{id}/upsert', App\Livewire\Entries\Purchase\Upsert::class)->name('purchases.upsert');
    Route::get('/purchases/{id}/print', App\Http\Controllers\Entries\Purchase\InvoiceController::class)->name('purchases.print');

    Route::get('/receipts', App\Livewire\Entries\Receipt\Index::class)->name('receipts');
    Route::get('/receipts/{id}/upsert', App\Livewire\Entries\Receipt\Upsert::class)->name('receipts.upsert');

    Route::get('/payments', App\Livewire\Entries\Payment\Index::class)->name('payments');
    Route::get('/payments/{id}/upsert', App\Livewire\Entries\Payment\Upsert::class)->name('payments.upsert');

});
