<x-layouts.app>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-6">
                @if ($post->isEdited())
                    <div class="d-flex align-items-center mb-3">
                        <div class="btn btn-sm btn-light rounded-pill mr-auto">
                            Updated at {{$post->updated_at->format('M d,Y')}}
                        </div>
                    </div>
                @endif

                <img src="{{ $post->featured_image }}" alt="Featured Image" class="mb-4 rounded-20 featured-image-sg">
                
                <div class="mb-3">
                    <h1 class="font-weight-bold" style="font-size: 40px">{{$post->title}}</h1>
                </div>
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div class="d-flex">
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
                    <div class="d-flex align-items-baseline">
                        <div>
                            <i class="far fa-comment fa-lg"> {{$post->comments_count}}</i>
                        </div>
                        <like
                            :likes-count="{{ $post->likes_count }}"
                            :liked="{{ json_encode($post->isLiked()) }}"
                            :item-id="{{ $post->id }}"
                            :logged-in="{{ json_encode(Auth::check()) }}"
                        ></like>
                        |
                        <a href="{{$post->getShareUrl('twitter')}}">
                            <i class="fab fa-twitter-square fa-lg">
                            </i>
                        </a>
                        <a href="{{$post->getShareUrl('facebook')}}">
                            <i class="fab fa-facebook-square fa-lg mx-1">
                            </i>
                        </a>
                        
                        <bookmark 
                            :post-id="{{$post->id}}"
                            :bookmarked="{{ json_encode(auth_user() ? auth_user()->isBookmark($post->id) : false)}}"
                            :logged-in="{{ json_encode(Auth::check())}}"
                        ></bookmark>
                    </div>
                </div>
                
                <div class="rounded ql-snow">
                    <div class="ql-editor px-0">
                        {!! $post->content !!}
                    </div>
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
                    <comment-list
                        :post-id={{$post->id}}
                        :author="{{$post->author}}"
                        :user="{{json_encode(auth_user())}}"
                    ></comment-list>
                </div>
            </main>
        </div>
        <div class="row justify-content-center my-5 mx-5">
            <div class="col-12">
                <hr class="border-black mb-5">
                <h3 class="font-weight-bold text-black-50 mb-5">Related posts</h3>
                <div class="d-flex mx-n5 mt-3">
                    @forelse ($relatedPosts as $relatedPost)
                        <div class="col-4 px-5 card">
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
                        <div class="mx-auto">
                            No related posts
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>