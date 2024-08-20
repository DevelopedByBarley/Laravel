<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::jobs()
    ]);
});

Route::get('/jobs/{id}', function ($id) {


    /* $job = Arr::first($jobs, function ($job) use ($id) {
    return (int)$job['id'] === (int)$id;
  }); */

    return view('job', ['job' => Job::find($id)]);
});

Route::get('/contact', function () {
    return view('contact');
});
