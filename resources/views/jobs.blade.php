<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <h1>Hello from the Jobs page</h1>

    @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{$job['id']}}" class="text-blue-400 hover:underline">
                <strong>{{ $job['title'] }}</strong> Pays: {{ $job['salary'] }}
            </a>
        </li>
    @endforeach
</x-layout>
