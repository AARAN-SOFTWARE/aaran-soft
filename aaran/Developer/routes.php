<?php

use Illuminate\Support\Facades\Route;

//developer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

Route::get('/software-details', \App\Livewire\Developer\Installation\SoftwareDetails::class)->name('software-details');

Route::get('/project-task', App\Livewire\Developer\ProjectTask\Index::class)->name('project-task');
Route::get('/project-task/{id}/show', App\Livewire\Developer\ProjectTask\Show::class)->name('project-task.show');

Route::get('/task-review', App\Livewire\Developer\TaskReview\Index::class)->name('task-review');
Route::get('/task-review/{id}/show', App\Livewire\Developer\TaskReview\Show::class)->name('task-review.show');
Route::get('/review-filename', App\Livewire\Developer\ReviewFileNme\Index::class)->name('review-filename');

Route::get('/surfing', App\Livewire\Developer\Surfing\Index ::class)->name('surfing');
Route::get('/surfing-category', App\Livewire\Developer\Surfing\SurfingCategoryList ::class)->name('surfing-category');
Route::get('/surfing/{id}/comments', App\Livewire\Developer\Surfing\Comments::class)->name('surfing.comments');

});

//Demo
Route::get('/demo-requests', App\Livewire\Webs\DemoRequest\Index::class)->name('demo-requests');
Route::get('/demo-requests/upsert', App\Livewire\Webs\DemoRequest\Upsert::class)->name('demo-requests.upsert');

Route::get('/ui-task', \App\Livewire\Developer\UiTask\Index::class)->name('ui-task');
Route::get('/ui-task/{id}/show', \App\Livewire\Developer\UiTask\UiShow::class)->name('ui-task.show');

Route::get('/fora', App\Livewire\Developer\Forum\Fora::class)->name('fora');
