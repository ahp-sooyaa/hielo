<x-layouts.reading-list-layout :user="$user">
    @forelse ($recentPosts as $recentPost)
    <div class="card shadow border-0 border-left-3 rounded-20 mb-5 p-4 text-black-50">
        <div class="d-flex justify-content-between">
            <h5 class="mr-3">
                <a href="{{ $recentPost->path() }}" class="font-weight-bold">
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
            {{str_limit($recentPost->excerpt, 80)}}
        </div>
        @if ($recentPost->collection)
            <div class="mb-2">
                Saved to 
                <span class="font-weight-bold">
                    {{$recentPost->collection ??''}}
                </span>
            </div>
        @endif
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <img src="{{ asset('avatars/default.jpg') }}" alt="avatar" class="avatar">
                <span class="font-weight-bold ml-2">
                    <a href="{{$recentPost->author->path()}}">
                        {{$recentPost->author->name}}
                    </a>
                </span>
            </div>
            <div>
                {{$recentPost->created_at->diffForHumans(null, true, true)}}
            </div>
        </div>
    </div>
    @empty
        no {{request('type')}} recentPosts yet!
    @endforelse
</x-layouts.reading-list-layout>