<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 vh-100">
                {{-- <form action="{{ $post->path() }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="d-flex">
                        <div 
                            class="d-flex flex-column border p-3 rounded-20 mr-5 h-50 bg-secondary text-primary"
                        >
                            <p>Edit Your post</p>
                            <button 
                                type="submit" value="Publish"
                                class="btn rounded-pill px-4 btn-primary mt-2" 
                            >Update</button>
                        </div>
                        <div>
                            <div class="form-group">
                                <input type="file" name="featured_image" class="mt-3 @error('featured_image') is-invalid @enderror">
                                @error('featured_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @include('posts._form')
                            <select name="tags[]" class="custom-select bg-primary text-white-50 border-0" multiple>
                                @forelse ($post->tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @empty 
                                    <input class="form-control" type="text" placeholder="Create new tag">
                                @endforelse
                            </select>
                        </div>
                    </div>
                </form> --}}
                <div class="card w-100 p-4">
                    <edit-blog :post-id={{ $post->id }}></edit-blog>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>