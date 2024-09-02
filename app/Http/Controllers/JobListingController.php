<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobListingController extends Controller
{
    public function index()
    {
        $jobs =  JobListing::with('employer')->latest()->paginate(3);
        return view('jobs.index', ['jobs' => $jobs]);
    }
    public function show(JobListing $job)
    {
        return view('jobs.show', ['job' =>  $job]);
    }
    public function create()
    {
        return view('jobs.create');
    }
    public function store()
    {
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
    }

    public function edit(JobListing $job)
    {
        if(Auth::guest()) {
            return redirect('/login');
        }

        if($job->employer->user->isNot(Auth::user())) {
            abort(403);
        };

        return view('jobs.edit', [
            'job' =>  $job
        ]);
    }

    public function update(JobListing $job)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update(request()->only(['title', 'salary']));

        return redirect('/jobs/' . $job->id);
    }
    public function destroy(JobListing $job)
    {
        $job->delete();

        return redirect()->route('jobs.index');
    }
}
