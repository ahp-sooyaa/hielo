<x-layouts.reading-list-layout :user="$user">
    <h3 class="mt-5">
        <span class="text-white-50">Collection \ </span>{{request()->segment(3)}}
    </h3>
    @forelse ($bookmarks as $bookmark)
        <div class="border-left-3 w-100 mb-5 px-4 w-75 text-white-50">
            <div class="d-flex justify-content-between">
                <h5>
                    <a href="{{ $bookmark->post->path() }}" class="text-white text-decoration-none">
                        {{$bookmark->post->title}}
                    </a>
                </h5>
                <div>
                    <div class="badge badge-pill badge-danger">
                        <span class="text-sm">Remove</span>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                {{$bookmark->post->excerpt}}
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <img style="width: 40px; height: 40px; border-radius: 50%" src="{{ asset('avatars/default.jpg') }}" alt="">
                    <span class="font-weight-bold text-white ml-2">
                        {{$bookmark->post->author->name}}
                    </span>
                </div>
                <div>
                    {{$bookmark->created_at->diffForHumans()}}
                </div>
            </div>
        </div>
    @empty 
        no posts saved yet!
    @endforelse
</x-layouts.reading-list-layout>