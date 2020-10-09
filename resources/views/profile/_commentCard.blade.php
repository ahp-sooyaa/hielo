<div class="card w-75 mx-auto rounded-20 h-270-px p-4 mb-4 shadow-sm border">
    <div class="d-flex justify-content-between h-100">
        <div class="w-100 mr-3">
            <div class="d-flex text-muted align-items-center mb-3">
                <i class="fas fa-user-circle fa-3x mr-2"></i>
                <div class="mr-auto">
                    <div class="text-dark font-weight-bold">
                        {{$comment->author->name}}
                    </div>
                    {{$comment->created_at->format('M d,Y')}}
                </div>
            </div>
            <div class="d-flex flex-column align-items-start h-72">
                <div class="card p-4 w-100 mb-auto">
                    <div class="font-weight-bold">
                        <a href="{{ $comment->post->path() }}" class="text-decoration-none">
                            {{$comment->post->title}}
                        </a>
                    </div>
                    <div class="text-muted">                    
                        {{ str_limit($comment->post->excerpt, 80) }}
                    </div>
                </div>
                <div class="my-3">
                    {{$comment->body}}
                </div>
                <div class="d-flex w-100 text-dark">
                    <div class="mr-auto">
                        <i 
                            class="far fa-comment fa-lg mr-2"
                        ></i>{{$comment->post->comments_count}}
                        <i 
                            class="far fa-heart fa-lg mx-2"
                        ></i>{{$comment->post->likes_count}}
                    </div>
                    <i class="far fa-bookmark fa-lg mt-1"></i>
                </div>
            </div>
        </div>
    </div>
</div>