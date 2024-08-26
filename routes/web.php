<?php

use App\Models\JobListing;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs =  JobListing::with('employer')->get();
    return view('jobs', [
        'jobs' => $jobs
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
