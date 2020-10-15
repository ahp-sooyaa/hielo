<x-layouts.app>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-6">
                <div class="d-flex align-items-center mb-3">
                    @if ($post->isEdited())
                        <div class="btn btn-sm btn-light rounded-pill mr-auto">
                            Updated at {{$post->updated_at->format('M d,Y')}}
                        </div>
                    @endif
                    {{-- <a class="text-danger" href="/postReports/{{$post->id}}/create">
                        report
                    </a> --}}
                </div>
                <div>
                    <img src="{{ $post->featured_image }}" alt="Featured Image" class="mb-4 rounded-20 featured-image-sg">
                </div>
                <div class="mb-3">
                    <h1 class="font-weight-bold" style="font-size: 40px">{{$post->title}}</h1>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <div class="d-flex mr-auto">
                        <img src="{{$post->author->avatar}}" alt="avatar" class="avatar mr-3">
                        <div>
                            <div class="font-weight-bolder">
                                <a href="{{$post->author->path()}}">{{$post->author->name}}</a>
                            </div>
                            <div class="text-black-50">
                                {{$post->created_at->format('M d,Y')}}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="far fa-comment fa-lg"> {{$post->comments_count}}</i>
                        <form 
                            method="POST" action="{{ $post->path(). '/like'}}" 
                            class="pt-1"
                        >
                            @csrf
                            <button class="bg-border-none">
                                <i class="{{ $post->isLiked() ? 'fas' : 'far'}} fa-heart fa-lg"> {{$post->likes_count}}</i> 
                            </button>
                        </form>
                        |
                        <a href="{{$post->getShareUrl('twitter')}}">
                            <i class="fab fa-twitter-square fa-lg mx-2"></i>
                        </a>
                        <a href="{{$post->getShareUrl('facebook')}}">
                            <i class="fab fa-facebook-square fa-lg mr-2"></i>
                        </a>
                        <form 
                            method="POST" action="/readingList/{{$post->id}}" 
                            class="pt-1"
                        >
                            @csrf
                            <button class="bg-border-none">
                                <i 
                                    class="{{ current_user()->isBookmark($post->id) ? 'fas' : 'far'}} fa-bookmark fa-lg"
                                ></i> 
                            </button>
                        </form>
                    </div>
                </div>
                <div style="font-size: 21px; line-height: 2rem;" class="overflow-hidden">
                    {!! $post->content !!}
                </div>
                <div>
                    @foreach ($post->tags as $tag)
                        <a href="/posts?tag={{$tag->name}}" class="text-decoration-none">   
                            <div class="btn btn-sm px-4 btn-info my-4 mr-3">
                                {{$tag->name}}
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{$post->comments_count}} Comments
                    <form action="{{ $post->path(). '/comment' }}" method="POST">
                        @csrf
                        <input class="form-control mt-3 rounded-pill p-4" type="text" name="body" placeholder="Contribute in Discussion ...">
                    </form>

                    {{-- comment and replies --}}
                    <div>
                        {{-- comment --}}
                        @forelse ($post->comments as $comment)
                            <div class="mt-3 px-4 py-3 comment-container">
                                <div class="d-flex mr-auto">
                                    <img src="{{$comment->author->avatar}}" alt="avatar" class="avatar mr-3">
                                    <div>
                                        <div class="mb-2">
                                            <span class="font-weight-bold mr-2">
                                                {{$comment->author->name}}
                                            </span>
                                            @if ($comment->author->name == $post->author->name)
                                                <span 
                                                    class="badge badge-secondary secondary-color mr-2"
                                                >
                                                    author
                                                </span>
                                            @endif
                                            <span class="text-dark-50">
                                                {{$comment->created_at->diffForHumans(null, true, true)}}
                                            </span>
                                        </div>
                                        <div>
                                            {{$comment->body}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- need to check condition 
                                <div class="text-center my-3">
                                Load more comments <i class="fas fa-chevron-down"></i>
                            </div> --}}
                        @empty 
                            <div class="text-center my-3">
                                No comments Yet!
                            </div>
                        @endforelse
                        {{-- reply --}}
                        {{-- <div class="d-flex">
                            <div style="width: 30px"></div>
                            <div class="card text-dark mt-3 px-4 py-3 ml-5" style="width: 550px">
                                <div class="d-flex mr-auto">
                                    <i class="fas fa-user-circle fa-3x mr-3"></i>
                                    <div>
                                        <div class="mb-2">
                                            <span class="font-weight-bold mr-2">
                                                {{$post->author->name}}
                                            </span>
                                            <span class="text-muted">2 min ago</span>
                                        </div>
                                        <div>
                                            Hello this is my first comment 
                                            second text
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </main>
        </div>
        <div class="row justify-content-center my-5 mx-5">
            <div class="col-12">
                <hr class="border-black mb-5">
                <h3 class="font-weight-bold text-black-50 mb-5">Related posts</h3>
                <div class="d-flex mx-n5 mt-3">
                    @forelse ($relatedPosts as $relatedPost)
                        <div class="col-4 px-5">
                            {{-- <img class="h-270-px" src="{{$relatedPost->featured_image}}" alt="relatingPost_featured_image"> --}}
                            <h5 class="text-muted">
                                - 
                                {{$relatedPost->tags->pluck('name')->join(', ')}}
                            </h5>
                            <h4 class="my-4">
                                <a href="{{$post->path()}}">
                                    {{$relatedPost->title}}
                                </a>
                            </h4>
                            <div class="d-flex align-items-center">
                                <img src="{{$relatedPost->author->avatar}}" alt="avatar" class="avatar mr-3">
                                <div>
                                    <a href="{{$relatedPost->author->path()}}" class="font-weight-bold">{{$relatedPost->author->name}}</a>
                                    <div class="text-black-50">{{$relatedPost->created_at->format('M d, Y')}}</div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-4">
                            no related posts
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>