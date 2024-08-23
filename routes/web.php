<?php

use App\Models\JobListing;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $job = JobListing::find(10);
    dd($job->tags);
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
