<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('creditbooks', App\Livewire\Admin\Creditbook\Index::class)->name('creditbooks');
    Route::get('creditbooks/{id}/items', App\Livewire\Admin\Creditbook\Item::class)->name('creditbooks.items');

    Route::get('interestBooks/{id}/show', App\Livewire\Admin\InterestBook\Index::class)->name('interestBooks.show');

    Route::get('socials', App\Livewire\Admin\Social\Index::class)->name('socials');


});
