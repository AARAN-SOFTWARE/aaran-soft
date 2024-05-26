<?php

use Illuminate\Support\Facades\Route;

//master
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('orders/{id}/style', App\Livewire\Erp\Order\Style::class)->name('orders.style');
    Route::get('orders/{id}/job-details', App\Livewire\Erp\Order\JobDetails::class)->name('orders.job-details');

    Route::get('ironings', App\Livewire\Erp\Production\Ironing\Index::class)->name('ironings');
    Route::get('ironings/{id}/upsert', App\Livewire\Erp\Production\Ironing\Upsert::class)->name('ironings.upsert');

    Route::get('fabriclots', App\Livewire\Erp\Fabrication\FabricLot\Index::class)->name('fabriclots');

    Route::get('jobcards', App\Livewire\Erp\Production\Jobcard\Index::class)->name('jobcards');
    Route::get('jobcards/{id}/upsert', App\Livewire\Erp\Production\Jobcard\Upsert::class)->name('jobcards.upsert');

    Route::get('cuttings', App\Livewire\Erp\Production\Cutting\Index::class)->name('cuttings');
    Route::get('cuttings/{id}/upsert', App\Livewire\Erp\Production\Cutting\Upsert::class)->name('cuttings.upsert');

    Route::get('peoutwards', App\Livewire\Erp\Production\PeOutward\Index::class)->name('peoutwards');
    Route::get('peoutwards/{id}/upsert', App\Livewire\Erp\Production\PeOutward\Upsert::class)->name('peoutwards.upsert');
    Route::get('peoutwards/{id}/print', App\Http\Controllers\Erp\Production\PeOutwardPrintController::class)->name('peoutwards.print');

    Route::get('peinwards', App\Livewire\Erp\Production\PeInward\Index::class)->name('peinwards');
    Route::get('peinwards/{id}/upsert', App\Livewire\Erp\Production\PeInward\Upsert::class)->name('peinwards.upsert');

    Route::get('sectionoutwards', App\Livewire\Erp\Production\SectionOutward\Index::class)->name('sectionoutwards');
    Route::get('sectionoutwards/{id}/upsert', App\Livewire\Erp\Production\SectionOutward\Upsert::class)->name('sectionoutwards.upsert');
    Route::get('sectionoutwards/{id}/print', App\Http\Controllers\Erp\Production\SectionOutwardPrintController::class)->name('sectionoutwards.print');

    Route::get('sectioninwards', App\Livewire\Erp\Production\SectionInward\Index::class)->name('sectioninwards');
    Route::get('sectioninwards/{id}/upsert', App\Livewire\Erp\Production\SectionInward\Upsert::class)->name('sectioninwards.upsert');


});
