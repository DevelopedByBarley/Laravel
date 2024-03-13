<div class="card">
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{$user->getImageURL()}}" alt="Mario Avatar">
                    <div>
                        <input value="{{ $user->name }}" name="name" type="text" class="form-control">
                        @error('name')
                            <p class="text-danger fs-6">{{ $message }}</p>
                        @enderror
                        <span class="fs-6 text-muted">@mario</span>
                    </div>
                </div>
                @auth
                    @if (Auth::id() === $user->id)
                        <div>
                            <a href="{{ route('users.show', $user->id) }}">View</a>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="mt-5">
                <label for="">Profile picture</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                    <p class="text-danger fs-6">{{ $message }}</p>
                @enderror
            </div>

            <div class="px-2 mt-4">
                <h5 class="fs-5"> About : </h5>
                <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{ $user->bio }}</textarea>
                    @error('bio')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-dark btn-sm my-3">Save</button>


                <div class="d-flex justify-content-start">
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                        </span> 0 Followers </a>
                    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                        </span> {{ $user->ideas->count() }} </a>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                        </span> {{ $user->comments->count() }} </a>
                </div>

            </div>
        </div>
    </form>
</div>
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
