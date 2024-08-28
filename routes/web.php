<?php

use App\Models\JobListing;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs =  JobListing::with('employer')->latest()->paginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});
Route::post('/jobs', function () {
    //Validation

    JobListing::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    return view('jobs.show', [
        'job' =>  JobListing::find($id)
    ]);
});





Route::get('/contact', function () {
    return view('contact');
});
