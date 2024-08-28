<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <h1>Hello from the Jobs page</h1>

    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-gray-950 hover:underline block px-4 py-6 border border-gray-200 rounded-lg">
                    <div class="font-bold text-blue-500">{{$job->employer->name }}</div>
                    <strong>{{ $job['title'] }}</strong> Pays: {{ $job['salary'] }}
                </a>
            </li>
        @endforeach
    </ul>

    <div>
            {{{ $jobs->links() }}}
    </div>
</x-layout>
