<h2>
    {{ $job->title }}
</h2>

<div>
    Congrats! This is working
</div>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View your job listing</a>
</p>
