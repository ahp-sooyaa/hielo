<x-layouts.reading-list-layout :user="$user">
    @if (is_string($recentPosts))
        {{$recentPosts}}
    @else
        @foreach($recentPosts as $recentPost)
        <div class="card shadow border-0 border-left-3 rounded-20 mb-5 p-4 text-black-50">
            <h5 class="mr-3">
                <a href="{{ $recentPost->path() }}" class="font-weight-bold">
                    {{$recentPost->title}}
                </a>
            </h5>
            <div class="mb-2">
                {{str_limit($recentPost->excerpt, 80)}}
            </div>
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
                    {{$recentPost->created_at->format('M d, Y')}}
                </div>
            </div>
        </div>
        @endforeach
    @endif
</x-layouts.reading-list-layout>