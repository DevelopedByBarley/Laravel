    @extends('layout.layout')

    @section('content')
        <div class="row">
            <div class="col-3">
                @include('includes.left_sidebar')
            </div>
            <div class="col-6">
                @include('includes.success_message')
                @include('includes.submit_idea')
                <hr>
                @forelse ($ideas as $idea)
                    <div class="mt-3">
                        {{ $ideas->withQueryString()->links() }}
                        @include('includes.idea_card')
                        {{ $ideas->withQueryString()->links() }}
                    </div>
                @empty
                    <p class="text-center m-3">No results found</p>
                @endforelse

            </div>
            <div class="col-3">
                @include('includes.search_bar')
                @include('includes.follow_box')
            </div>
        </div>
    @endsection
