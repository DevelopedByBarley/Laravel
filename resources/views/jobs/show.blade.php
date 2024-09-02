<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>

    <h2 class="text-xl font-bold ">{{ $job['title'] }}</h2>
    <p>This job pays {{ $job['salary'] }} per year.</p>

    <div class="mt-6 flex space-x-3">
        @can('edit-job', $job)
            <x-button href="/jobs/{{ $job->id }}/edit">Edit </x-button>
        @endcan
        <form action="/jobs/{{ $job->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 px-3 py-2 text-white">Delete</button>
        </form>
    </div>

</x-layout>
