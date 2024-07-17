<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('sportsClub', App\Livewire\Sports\Club::class)->name('sportsClub');
    Route::get('sportsClub/{id}/clubimage', \App\Livewire\Sports\Images\ClubImage::class)->name('sportsClub.clubimage');

    Route::get('sportsClub/masters', App\Livewire\Sports\Master::class)->name('sportsClub.masters');
    Route::get('sportsClub/{id}/masterImage', \App\Livewire\Sports\Images\MasterImage::class)->name('sportsClub.masterImage');

    Route::get('sportsClub/activity', App\Livewire\Sports\Activity::class)->name('sportsClub.activity');
    Route::get('sportsClub/{id}/highlight', App\Livewire\Sports\Highlight::class)->name('sportsClub.highlight');

    Route::get('sportsClub/{id}/students', App\Livewire\Sports\Student::class)->name('sportsClub.students');
    Route::get('sportsClub/studentsView', App\Livewire\Sports\StudentView::class)->name('sportsClub.studentsView');
    Route::get('sportsClub/{id}/studentImage', \App\Livewire\Sports\Images\StudentImage::class)->name('sportsClub.studentImage');
    Route::get('sportsClub/show', \App\Livewire\Sports\Images\Show::class)->name('sportsClub.show');


    Route::get('/contact', \App\Livewire\Sports\Web\Contact::class)->name('contact');




    Route::get('sportsClub/SportAchievement', \App\Livewire\Sports\SportAchievement::class)->name('sportsClub.sportAchievement');
    Route::get('sportsClub/sportNews',\App\Livewire\Sports\SportNews::class)->name('sportsClub.sportNews');

});

Route::get('/gallery', \App\Livewire\Sports\Web\Gallery::class)->name('gallery');
Route::get('/videos', \App\Livewire\Sports\Web\Videos::class)->name('videos');
Route::get('/news', \App\Livewire\Sports\Web\News::class)->name('news');
Route::get('/showNews', \App\Livewire\Sports\Web\AllNews::class)->name('showNews');
