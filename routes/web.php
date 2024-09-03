<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\RegistrationController;
use App\Mail\JobListingPosted;
use Illuminate\Support\Facades\Mail;

// Home
Route::view('/', 'home');
Route::view('/contact', 'contact');


//Route::resource('jobs', JobListingController::class)->only(['index', 'show']);
//Route::resource('jobs', JobListingController::class)->except(['index', 'show'])->middleware('auth');


Route::controller(JobListingController::class)->group(function () {
    Route::get('/jobs', 'index')->name('jobs.index');
    Route::get('/jobs/create',  'create');
    Route::post('/jobs', 'store')->middleware('auth');
    Route::get('/jobs/{job}',  'show')->name('jobs.show');
    //Route::get('/jobs/{job}/edit', 'edit')->middleware('auth')->can('edit-job', 'job');
    Route::get('/jobs/{job}/edit', 'edit')->middleware('auth')->can('edit', 'job');

    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}',  'destroy');
});



//Auth
Route::get('/register', [RegistrationController::class, 'create']);
Route::post('/register', [RegistrationController::class, 'store']);


Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);



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
