<x-admin.layouts.app>
    <div class="card p-3">
        <h1>Create Post</h1>
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input name="featured_image" class="form-control" type="file">
            </div>
            <div class="form-group">
                <input
                    type="text" name="title" rows="1" placeholder="Title" 
                    class="form-control mt-3 @error('title') is-invalid @enderror"
                >
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input 
                    type="text" name="excerpt" placeholder="Write a excerpt for post ..."  
                    class="form-control @error('excerpt') is-invalid @enderror"
                >
                @error('excerpt')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <textarea 
                    name="content"
                    class="editable @error('content') is-invalid @enderror"
                >
                </textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="published_at" class="form-control @error('published_at') is-invalid @enderror" type="text" value="{{date('Y-m-d H:i:s')}}">
                @error('published_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mr-3">
                Publish
            </button>
            <a href="/admin/posts">
                back
            </a>
        </form>
    </div>
</x-admin.layouts.app>