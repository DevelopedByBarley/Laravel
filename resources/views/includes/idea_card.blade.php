<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $idea->user->name }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form action="{{ route('idea.destroy', $idea->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <a class="m-2" href="{{ route('idea.edit', $idea->id) }}"> Edit </a>
                    <a href="{{ route('idea.show', $idea->id) }}"> View </a>
                    <button class="ms-2 btn btn-danger btn-sm">x</button>
                </form>
            </div>
        </div>

    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('idea.update', $idea->id) }}" method="POST">
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    @csrf
                    <button type="submit" class="btn btn-dark mb-2"> Update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ date('Y/m/d', $idea->createdAt) }}
                </span>
            </div>
        </div>
        <div>

            @include('includes.comments_box')
        </div>
    </div>
</div>
