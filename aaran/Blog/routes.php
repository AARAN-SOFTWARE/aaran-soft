<?php

use Illuminate\Support\Facades\Route;

//Demo
//Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/posts', App\Livewire\Blog\Post\Index::class)->name('posts');
    Route::get('/posts/{id}/upsert', App\Livewire\Blog\Post\Upsert::class)->name('posts.upsert');
    Route::get('/posts/{id}/views', App\Livewire\Blog\Post\View::class)->name('posts.views');
//});
