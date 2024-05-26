<?php

use Illuminate\Support\Facades\Route;

//testing
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/test-action-file', App\Livewire\Testing\TestingModule\ActionFile::class)->name('test-action-file');
    Route::get('/testing', App\Livewire\Testing\TestingModule\Index::class)->name('testing');
    Route::get('/testing/{id}/modal', App\Livewire\Testing\TestingModule\TestModal::class)->name('testing.modal');
    Route::get('/modal/{id}/action', App\Livewire\Testing\TestingModule\TestAction::class)->name('modal.action');
    Route::get('/action/{id}/{modals_id}/operation', App\Livewire\Testing\TestingModule\TestOperation::class)->name('action.operation');
    Route::get('/operation/{id}/reply', App\Livewire\Testing\TestingModule\TestReply::class)->name('operation.reply');
});
