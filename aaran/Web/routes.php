<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/homeslides', App\Livewire\Webs\HomeSlide\Index::class)->name('homeslides');
    Route::get('/category',App\Livewire\Webs\Feed\Category::class)->name('category');
    Route::get('/category/{id}/tag',App\Livewire\Webs\Feed\Tag::class)->name('category.tag');

    Route::get('/testimony',App\Livewire\Webs\Testimony\Index::class)->name('testimony');
    Route::get('/testimony/{id}/upsert',App\Livewire\Webs\Testimony\Upsert::class)->name('testimony.upsert');

    Route::get('/stats',App\Livewire\Webs\Stats\Index::class)->name('stats');
    Route::get('/stats/{id}/upsert',App\Livewire\Webs\Stats\Upsert::class)->name('stats.upsert');

});
    Route::get('/feed/{category_id?}/{tag_id?}',App\Livewire\Webs\Feed\Index::class)->name('feed');
    Route::get('/feed/{id?}/show',App\Livewire\Webs\Feed\Show::class)->name('feed.show');

    Route::get('factors', App\Livewire\factor\Index::class)->name('factors');
