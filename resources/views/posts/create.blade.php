<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 vh-100">
                <form action="/posts" method="POST" enctype="multipart/form-data">
                    <div class="d-flex">
                        <div 
                            class="d-flex flex-column border p-3 rounded-20 mr-5 h-50 bg-secondary text-primary"
                        >
                            <p>Enter the date and time 
                                <br>when you wish to publish.</p>
                            <input 
                                type="text" class="form-control" name="published_at" value="{{date('Y-m-d H:i:s')}}"
                            >
                            <button 
                                type="submit" value="Publish" name="action"
                                class="btn rounded-pill px-4 btn-primary mt-2" 
                            >Publish</button>
                            <span class="text-center mt-2">Or</span>
                            <button 
                                type="submit" value="Draft" name="action"
                                class="btn btn-outline-primary rounded-pill px-4 mt-2" 
                            >Save as draft</button>
                        </div>
                        <div class="w-75">
                            <input type="file" name="featured_image" class="mt-3">
                            @include('posts._form', ['post' => new App\Post])
                            <select name="tags[]" class="custom-select bg-primary text-white-50 border-0" multiple>
                                @forelse ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @empty 
                                    <input class="form-control" type="text" placeholder="Create new tag">
                                @endforelse
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>