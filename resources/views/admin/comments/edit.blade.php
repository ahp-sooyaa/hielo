<x-admin.layouts.app tab="comments">
    <div class="card p-3">
        <h1>Edit Comment</h1>
        <form action="/admin/comments/{{$comment->id}}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Post Title (* readonly)</label>
                <input class="form-control" type="text" placeholder="{{$comment->post->title}}" readonly>
            </div>
            <div class="form-group">
                <label for="name">Author Name (* readonly)</label>
                <input class="form-control" type="text" placeholder="{{$comment->post->author->name}}" readonly>
            </div>
            <div class="form-group">
                <label for="body">Comment Content</label>
                <input
                    type="text" name="body" 
                    class="form-control @error('body') is-invalid @enderror"
                    value="{{$comment->body}}"
                >
                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-3">
                Update
            </button>
            <a href="/admin/comments">
                back
            </a>
        </form>
    </div>
</x-admin.layouts.app>