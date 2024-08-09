<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Webs\Home\Index::class)->name('home');
Route::get('/service', \App\Livewire\Webs\Service\Service::class)->name('service');
Route::get('/about', \App\Livewire\Webs\About\About::class)->name('about');
Route::get('/contact', \App\Livewire\Webs\Contact\Contact::class)->name('contact');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', App\Livewire\Dashboard\Index::class)->name('dashboard');
//    Route::get('/masterGst', App\Http\Controllers\Gst\masterGst::class)->name('masterGst');

});


//utility
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/icons', App\Livewire\Utilities\Icon\Index::class)->name('icons');
    //sys
    Route::get('sys', App\Livewire\Sys\Artisan\Migration::class)->name('sys');
    //zync
    Route::get('zync', App\Livewire\Zync\Audit\SalesTrack\Index::class)->name('zync');

});


//E-invoice
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/einvoice', App\Livewire\MasterGst\Einvoice\Index::class)->name('einvoice');

});




