<?php

use App\Models\JobListing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    return view('jobs', [
        'jobs' =>  JobListing::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {


    return view('job', [
        'job' =>  JobListing::find($id)
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
