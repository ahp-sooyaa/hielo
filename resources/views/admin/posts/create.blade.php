<x-admin.layouts.app tab="posts">
    <div class="card p-3">
        <h1>Create Post</h1>
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input name="featured_image" class="border-0 @error('featured_image') is-invalid @enderror" type="file">
                @error('featured_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input
                    type="text" name="title" rows="1" placeholder="Post Title" 
                    class="form-control mt-3 @error('title') is-invalid @enderror"
                    value="{{old('title')}}"
                >
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input 
                    type="text" name="excerpt" placeholder="Post Excerpt"  
                    class="form-control @error('excerpt') is-invalid @enderror"
                    value="{{old('excerpt')}}"
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
                    class="form-control @error('content') is-invalid @enderror"
                    rows="10" placeholder="Post Content"
                >{{old('content')}}
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
            <div class="form-group">
                <select name="tags[]" class="form-control @error('tags') is-invalid @enderror" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
                @error('tags')
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