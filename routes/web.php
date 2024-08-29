<?php

use App\Http\Controllers\JobListingController;
use App\Models\JobListing;
use Illuminate\Support\Facades\Route;

// Home
Route::view('/', 'home');
Route::view('/contact', 'contact');
Route::resource('jobs', JobListingController::class);


/* Route::controller(JobListingController::class)->group(function () {
    Route::get('/jobs', 'index')->name('jobs.index');
    Route::get('/jobs/create',  'create');
    Route::get('/jobs/{job}',  'show')->name('jobs.show');

    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}',  'destroy');
}); */

/* Route::resource('jobs', JobListingController::class, [
    'only' => ['edit']
]); */
