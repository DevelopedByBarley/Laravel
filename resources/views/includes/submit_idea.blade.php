@auth
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{ route('idea.create') }}" method="POST">
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                @csrf
                <button type="submit" class="btn btn-dark"> Share </button>
            </div>
        </form>
    </div>

@endauth

@guest
    <h4>Login to share yours idea</h4>
@endguest
