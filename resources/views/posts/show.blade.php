<x-layouts.app>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-3 d-flex align-items-center pl-5">
                <div>
                    Written by {{$post->author->name}}
                    <div class="pl-2 border-left-3 w-75">
                        PHP and JavaScript hacker. 
                        Symfony and Laravel tinkerer. 
                        Creator of TomahawkPHP
                    </div>
                </div>
            </div>
            <main class="col-6 overflow-y">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-sm rounded-pill px-4 bg-secondary my-4 mr-auto">
                        <a href="/posts/create" class="text-decoration-none">Updated at Aug, 12 2020</a>
                    </button>
                    <a class="text-danger" href="/postReports/{{$post->id}}/create">
                        report
                    </a>
                </div>
                <div>
                    <img src="{{ $post->featured_image }}" alt="Featured Image" class="mb-4 rounded-20 h-200-px w-100">
                </div>
                <div class="mb-3">
                    <h1 class="font-weight-bold" style="font-size: 40px">{{$post->title}}</h1>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <div class="d-flex mr-auto">
                        <i class="fas fa-user-circle fa-3x mr-2"></i>
                        <div>
                            <div class="font-weight-bolder">
                                {{$post->author->name}}
                            </div>
                            <div class="text-white-50">
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
                            <button class="like text-secondary">
                                <i class="{{ $post->isLiked() ? 'fas' : 'far'}} fa-heart fa-lg"> {{$post->likes_count}}</i> 
                            </button>
                            |
                        </form>
                        <i class="fab fa-twitter-square fa-lg mx-2"></i>
                        <i class="fab fa-facebook-square fa-lg mr-2"></i>
                        <i class="far fa-bookmark fa-lg"></i>
                    </div>
                </div>
                <div style="font-size: 21px; line-height: 2rem;" class="overflow-hidden">
                    {!! $post->content !!}
                </div>
                <div>
                    @foreach ($post->tags as $tag)
                        <a href="/posts?tag={{$tag->name}}" class="text-decoration-none">   
                            <div class="btn btn-sm px-4 bg-secondary my-4 mr-3">
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
                            <div class="text-secondary mt-3 px-4 py-3 hover">
                                <div class="d-flex mr-auto">
                                    <i class="fas fa-user-circle fa-3x mr-3"></i>
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
            <div class="col-3"></div>
        </div>
    </div>
</x-layouts.app>