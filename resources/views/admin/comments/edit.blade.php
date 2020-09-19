<x-admin.layouts.app>
    <div class="card p-3">
        <h1>Edit Comment</h1>
        <div>
            <span class="text-black-50 d-inline-block">Post Title: </span> {{$comment->post->title}}
        </div>
        <div>
            <span class="text-black-50 d-inline-block">Post Author: </span> {{$comment->post->author->name}}
        </div>
        <form action="/admin/comments/{{$comment->id}}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <input
                    type="text" name="body" 
                    class="form-control mt-3 @error('password') is-invalid @enderror"
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