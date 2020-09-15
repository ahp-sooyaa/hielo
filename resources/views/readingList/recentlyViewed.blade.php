<x-layouts.reading-list-layout :user="$user">
    @forelse ($recentPosts as $recentPost)
    <div class="border-left-3 w-100 mt-5 mb-5 px-4 w-75 text-white-50">
        <div class="d-flex justify-content-between">
            <h5>
                <a href="{{ $recentPost->path() }}" class="text-white text-decoration-none">
                    {{$recentPost->title}}
                </a>
            </h5>
            <div>
                <div class="badge badge-pill badge-danger">
                    <span class="text-sm">Remove</span>
                </div>
            </div>
        </div>
        <div class="mb-2">
            {{$recentPost->excerpt}}
        </div>
        @if ($recentPost->collection)
            <div class="mb-2 text-white-50">
                Saved to 
                <span class="font-weight-bold text-white">
                    {{$recentPost->collection ??''}}
                </span>
            </div>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <img style="width: 40px; height: 40px; border-radius: 50%" src="{{ asset('avatars/default.jpg') }}" alt="">
                <span class="font-weight-bold text-white ml-2">
                    {{$recentPost->author->name}}
                </span>
            </div>
            <div>
                {{$recentPost->created_at->diffForHumans()}}
            </div>
        </div>
    </div>
    @empty
        no {{request('type')}} recentPosts yet!
    @endforelse
</x-layouts.reading-list-layout>