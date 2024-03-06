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
                <div class="mt-3">
                    {{ $ideas->links() }}

                    @foreach ($ideas as $idea)
                        @include('includes.idea_card')
                    @endforeach
                    {{ $ideas->links() }}

                </div>
            </div>
            <div class="col-3">
                @include('includes.search_bar')
                @include('includes.follow_box')
            </div>
        </div>
    @endsection
