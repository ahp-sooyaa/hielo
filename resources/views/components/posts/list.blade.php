@forelse ($posts as $post)
    <div class="card shadow border-bottom-3 rounded-20 p-4 mb-4 border-0">
        <div class="m-n4">
            <img src="{{ $post->featured_image }}" alt="Featured Image" class="rounded-top-20 h-300-px w-100">
        </div>
        <div class="d-flex mt-5">
            <h4 class="mr-auto">
                <a href="{{ $post->path() }}" class="text-dark text-decoration-none">
                    {{$post->title}}
                </a>
            </h4>
            <bookmark 
                :post-id="{{$post->id}}"
                :bookmarked="{{ json_encode(current_user()->isBookmark($post->id))}}"
                :logged-in="{{json_encode(Auth::check())}}"
            ></bookmark>
        </div>
        <div class="text-muted mb-auto">                    
            {{ Str::limit($post->excerpt, 80) }}
        </div>
        <div class="d-flex text-muted align-items-center mt-3">
            <img src="{{$post->author->avatar}}" alt="avatar" class="avatar mr-2">
            <div class="mr-auto">{{$post->author->name}}</div>
            {{$post->published_at->format('M d,Y')}}
        </div>
    </div>
@empty
    <div class="mx-auto text-center">
        <div>
            <img src="https://hielo.dev/appImage/kingdom-premium-upgrade.png" alt="" style="height: 300px; width: 300px">
        </div>
        No Posts yet!
    </div>
@endforelse