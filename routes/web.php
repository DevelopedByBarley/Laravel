<?php

use App\Models\JobListing;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('home');
});


// All
Route::get('/jobs', function () {
    $jobs =  JobListing::with('employer')->latest()->paginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
})->name('jobs.index');

// Store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

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



Route::get('/jobs/{job}', function (JobListing $job) {
    return view('jobs.show', [
        'job' =>  $job
    ]);
})->name('jobs.show');

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    return view('jobs.edit', [
        'job' =>  JobListing::find($id)
    ]);
});


// Update
Route::patch('/jobs/{job}', function (JobListing $job) {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    $job->update(request()->only(['title', 'salary']));

    return redirect('/jobs/' . $job->id);
});

// DELETE
Route::delete('/jobs/{job}', function (JobListing $job) {
    $job->delete();

    return redirect()->route('jobs.index');
});






Route::get('/contact', function () {
    return view('contact');
});
