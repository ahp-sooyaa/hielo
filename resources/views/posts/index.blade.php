<x-layouts.app>
    <div class="container">
        <header class="d-flex align-items-end my-4">
            @if (request('tag'))
                <h4 class="mr-auto mb-0 text-white-50">
                    <a href="/posts" class="text-decoration-none text-secondary">All Posts</a> / Tag: {{request('tag')}} 
                </h4>
            @else 
                <h4 class="mr-auto mb-0 text-white-50">All Posts</h4>
            @endif
            <a href="/posts/create" class="text-decoration-none">
                <button type="button" class="btn rounded-pill px-4 btn-secondary">
                    Create Post
                </button>
            </a>
        </header>
        <main class="d-flex flex-wrap mx-n3">
            @forelse ($posts as $post)
            <div class="w-33 px-3">
                <div class="card rounded-20 h-300-px p-4 mb-4 shadow-sm border-0">
                    <div class="m-n4">
                        <img src="{{ $post->featured_image }}" alt="Featured Image" class="rounded-top-20 h-100-px w-100">
                    </div>
                    <div class="d-flex mt-5">
                        <h4 class="mr-auto">
                            <a href="{{ $post->path() }}" class="text-dark text-decoration-none">
                                {{$post->title}}
                            </a>
                        </h4>
                        <i class="far fa-bookmark text-dark mt-1"></i>
                    </div>
                    <div class="text-muted mb-auto">                    
                        {{ Str::limit($post->excerpt, 80) }}
                    </div>
                    <div class="d-flex text-muted align-items-center">
                        <i class="fas fa-user-circle fa-2x mr-2"></i>
                        <div class="mr-auto">{{$post->author->name}}</div>
                        {{$post->published_at->diffForHumans()}}
                    </div>
                </div>
            </div>  
            @empty
                <div class="mx-auto text-center">
                    No Posts yet! :) <br>
                    According to post index logic, user & following user created posts will be showed.
                </div>
            @endforelse
        </main>
    </div>
</x-layouts.app>