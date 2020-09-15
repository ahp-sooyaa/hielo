<x-layouts.profile-layout :user="$user">
    <div>
        @forelse ($user->comments as $comment)
            <div class="w-75 mx-auto mt-5">
                <h3 class="font-weight-bold">
                    {{$user->name}} commented 
                </h3>
            </div>
            @if ($comment->post->published_at != NULL)
            <div class="card w-75 mx-auto rounded-20 h-270-px p-4 mb-4 shadow-sm border">
                <div class="d-flex justify-content-between h-100">
                    <div class="w-100 mr-3">
                        <div class="d-flex text-muted align-items-center mb-3">
                            <i class="fas fa-user-circle fa-3x mr-2"></i>
                            <div class="mr-auto">
                                <div class="text-dark font-weight-bold">
                                    {{$comment->author->name}}
                                </div>
                                {{$comment->created_at->diffForHumans()}}
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-start h-72">
                            <div class="card p-4 w-100 mb-auto">
                                <h3 class="font-weight-bold">
                                    <a href="{{ $comment->post->path() }}" class="text-dark text-decoration-none">
                                        {{$comment->post->title}}
                                    </a>
                                </h3>
                                <h4 class="text-muted">                    
                                    {{ Illuminate\Support\Str::limit($comment->post->excerpt, 80) }}
                                </h4>
                            </div>
                            <div class="text-primary my-3">
                                {{$comment->body}}
                            </div>
                            <div class="d-flex w-100 text-dark">
                                <div class="mr-auto">
                                    <i 
                                        class="far fa-comment fa-lg"
                                    > {{$comment->post->comments_count}}</i>
                                    <i 
                                        class="far fa-heart fa-lg ml-4"
                                    > {{$comment->post->likes_count}}</i>
                                </div>
                                <i class="far fa-bookmark fa-lg mt-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @empty
            <div class="w-75 mx-auto text-center mt-5">
                No comments yet!
            </div>
        @endforelse
    </div>
</x-layouts.profile-layout>