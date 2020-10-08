<div class="card border-0 border-bottom-3 w-75 mx-auto rounded-20 p-4 mb-4 shadow">
    <div class="d-flex justify-content-between">
        <div class="w-100 mr-3 position-relative">
            <div class="d-flex text-muted align-items-center mb-3">
                <img src="{{$post->author->avatar}}" alt="avatar" class="avatar mr-3">
                <div class="mr-auto">
                    <div class="text-dark font-weight-bold">
                        {{$post->author->name}}
                    </div>
                    {{$post->published_at->format('M d,Y')}}
                </div>
            </div>
            <div class="mb-4">
                <div class="mb-3">
                    <a 
                        href="{{ $post->path() }}" 
                        class="text-dark text-decoration-none font-weight-bold"
                    >
                        {{$post->title}}
                    </a>
                </div>
                <div class="text-muted">                    
                    {{ str_limit($post->excerpt, 80) }}
                </div>
            </div>
            <div class="d-flex w-100 text-dark position-absolute fixed-bottom">
                <div class="mr-auto text-muted">
                    <i 
                        class="far fa-comment fa-lg mr-2"
                    ></i>{{$post->comments_count}}
                    <i 
                        class="far fa-heart fa-lg mx-2"
                    ></i>{{$post->likes_count}}
                </div>
                <i class="far fa-bookmark fa-lg mt-1"></i>
            </div>
        </div>
        <div>
            <img src="{{ $post->featured_image }}" alt="Featured Image" class="rounded-20 h-210-px w-240-px">
        </div>
    </div>
</div>