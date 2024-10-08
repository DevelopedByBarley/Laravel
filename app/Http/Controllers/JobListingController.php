<?php

namespace App\Http\Controllers;

use App\Mail\JobListingPosted;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

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

        $job = JobListing::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        Mail::to($job->employer->user)->queue(new JobListingPosted($job));

        return redirect('/jobs');
    }

    public function edit(JobListing $job)
    {
/*         Gate::define('edit-job', function (User $user, JobListing $job) {
            return $job->employer->user->is($user);
        }); */


/*         if(Auth::guest()) {
            return redirect('/login');
        } */

     /*    if(Auth::user()->cannot('edit-job', $job)) {
            dd('hello');
        } */

/*         Gate::authorize('edit-job', $job);
 */
     /*   if( Gate::denies('edit-job', $job)) {
        //
       } */

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
