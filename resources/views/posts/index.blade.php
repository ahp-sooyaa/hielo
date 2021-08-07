<x-layouts.app>
    <div class="container">
        <header class="d-flex align-items-end my-4">
            @if (request('tag'))
                <span class="mr-auto mb-0">
                    <a href="/posts" class="text-dark">All Posts</a> / Tag: {{request('tag')}} 
                </span>
            @endif
        </header>
        <main class="row">
            <div class="col-md-8">
                <x-posts.list :posts="$posts"></x-posts.list>
                @if (!request('tag'))
                    <span class="text-dark pl-3">{{ $posts->links() }}</span>
                @endif
            </div>
            <div class="col-md-3 offset-md-1">
                <h5>Tags</h5>
                @forelse ($tags as $tag)
                    <a href="/posts?tag={{$tag->name}}" class="text-decoration-none"> 
                        <div class="btn btn-sm {{ request('tag')==$tag->name ? 'btn-info' : 'btn-outline-info' }} mb-3">
                            {{$tag->name}}
                        </div>
                    </a>
                @empty
                    No tags yet!
                @endforelse
            </div>
        </main>
    </div>
</x-layouts.app>