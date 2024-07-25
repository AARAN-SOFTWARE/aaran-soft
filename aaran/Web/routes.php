<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/homeslides', App\Livewire\Webs\HomeSlide\Index::class)->name('homeslides');
    Route::get('/category',App\Livewire\Webs\Feed\Category::class)->name('category');
    Route::get('/category/{id}/tag',App\Livewire\Webs\Feed\Tag::class)->name('category.tag');

});
    Route::get('/feed/{category_id?}/{tag_id?}',App\Livewire\Webs\Feed\Index::class)->name('feed');
    Route::get('/feed/{id}/show',App\Livewire\Webs\Feed\Show::class)->name('show');
