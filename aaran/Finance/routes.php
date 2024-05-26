<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('mgClubs', App\Livewire\Magalir\MgClub\Index::class)->name('mgClubs');
    Route::get('mgClubs/{id}/members', App\Livewire\Magalir\MgMember\Index::class)->name('mgClubs.members');
    Route::get('mgClubs/{id}/loan', App\Livewire\Magalir\MgLoan\Index::class)->name('mgClubs.loan');
    Route::get('mgClubs/{id}/passbook', App\Livewire\Magalir\MgPassbook\Index::class)->name('mgClubs.passbook');

    Route::get('mgClubs/collections', App\Livewire\Magalir\MgCollection\Index::class)->name('mgClubs.collections');

    Route::get('emiCalculator', App\Livewire\Finance\Tools\EmiCalculator::class)->name('emiCalculator');
});
