<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('home');
});

Route::get('/jobs', function () {
  return view('jobs', [
    'jobs' => [
      [
        'id' => 1,
        'title' => 'Director',
        'salary' => '$50,000'
      ],
      [
        'id' => 2,
        'title' => 'Programmer',
        'salary' => '$100,000'
      ],
    ]
  ]);
});

Route::get('/jobs/{id}', function ($id) {
  $jobs = [
    [
      'id' => 1,
      'title' => 'Director',
      'salary' => '$50,000'
    ],
    [
      'id' => 2,
      'title' => 'Programmer',
      'salary' => '$100,000'
    ],
  ];

  /* $job = Arr::first($jobs, function ($job) use ($id) {
    return (int)$job['id'] === (int)$id;
  }); */

  $job = Arr::first($jobs, fn($job) => (int)$job['id'] === (int)$id);
  return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
  return view('contact');
});
