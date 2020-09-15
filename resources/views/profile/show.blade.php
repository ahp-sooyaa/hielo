<x-layouts.profile-layout :user="$user">
    <div>
        <div class="w-75 mx-auto mt-5">
            <h3 class="font-weight-bold">Latest</h3>
        </div>
        @forelse ($user->posts as $post)
            @if ($post->published_at != NULL)
            <div class="card w-75 mx-auto rounded-20 p-4 mb-4 shadow-sm border">
                <div class="d-flex justify-content-between">
                    <div class="w-100 mr-3 position-relative">
                        <div class="d-flex text-muted align-items-center mb-3">
                            <i class="fas fa-user-circle fa-3x mr-2"></i>
                            <div class="mr-auto">
                                <div class="text-dark font-weight-bold">
                                    {{$post->author->name}}
                                </div>
                                {{$post->published_at->diffForHumans()}}
                            </div>
                        </div>
                        <div class="mb-5">
                            <h3 class="font-weight-bold">
                                <a href="{{ $post->path() }}" class="text-dark text-decoration-none">
                                    {{$post->title}}
                                </a>
                            </h3>
                            <h4 class="text-muted">                    
                                {{ Illuminate\Support\Str::limit($post->excerpt, 80) }}
                            </h4>
                        </div>
                        <div class="d-flex w-100 text-dark position-absolute fixed-bottom">
                            <div class="mr-auto">
                                <i 
                                    class="far fa-comment fa-lg"
                                > {{$post->comments_count}}</i>
                                <i 
                                    class="far fa-heart fa-lg ml-4"
                                > {{$post->comments_count}}</i>
                            </div>
                            <i class="far fa-bookmark fa-lg mt-1"></i>
                        </div>
                    </div>
                    <div>
                        <img src="{{ $post->featured_image }}" alt="Featured Image" class="rounded-20 h-100 w-240-px">
                    </div>
                </div>
            </div>
            @endif
        @empty
            <div class="w-75 mx-auto text-center mt-5">
                No posts yet!
            </div>
        @endforelse
    </div>
</x-layouts.profile-layout>