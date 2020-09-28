<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 vh-100">
                {{-- <div class="d-flex"> --}}
                    <div class="card w-100 p-4">
                        {{-- <form id="postForm" action="/posts" method="POST" enctype="multipart/form-data">
                            <button class="btn btn-primary">Publish</button>
                            <div class="w-100">
                                <div class="form-group">
                                    <input 
                                        type="file" name="featured_image" 
                                        class="form-control mt-3 @error('featured_image') is-invalid @enderror"
                                    >
                                    @error('featured_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input 
                                        type="text" class="form-control" name="published_at" value="{{date('Y-m-d H:i:s')}}"
                                    >
                                </div>
                                
                                @include('posts._form', ['post' => new App\Post])

                                <select name="tags[]" class="form-control" multiple>
                                    @forelse ($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @empty 
                                        <input class="form-control" type="text" placeholder="Create new tag">
                                    @endforelse
                                </select>
                            </div>
                        </form> --}}
                        <create-blog></create-blog>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</x-layouts.app>