<x-admin.layouts.app>
    <div class="card p-3">
        <h1>Create Post</h1>
        <form action="/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <input name="featured_image" class="form-control" type="file">
            </div>
            <div class="form-group">
                <input
                    type="text" name="title" rows="1" 
                    class="form-control mt-3"
                    value="{{$post->title}}"
                >
            </div>
            <div class="form-group">
                <input 
                type="text" name="excerpt"  
                class="form-control" value="{{$post->excerpt}}"
            >
            </div>
            <div class="form-group">
                <textarea 
                    name="content"
                    class="editable"
                >{{$post->content}}
                </textarea>
            </div>
            <div class="form-group">
                <input name="published_at" class="form-control" type="text" value="{{$post->published_at}}">
            </div>
            <button class="btn btn-primary mr-3">
                Update
            </button>
            <a href="/admin/posts">
                back
            </a>
        </form>
    </div>
</x-admin.layouts.app>