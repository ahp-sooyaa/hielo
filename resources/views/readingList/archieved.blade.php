<x-layouts.reading-list-layout :user="$user">
    @forelse ($bookmarks as $bookmark)
    <div class="border-left-3 w-100 mt-5 mb-5 px-4 w-75 text-white-50">
        <div class="d-flex justify-content-between">
            <h5>
                <a href="{{ $bookmark->post->path() }}" class="text-white text-decoration-none">
                    {{$bookmark->post->title}}
                </a>
            </h5>
            <div>
                <form 
                    action="{{'/readingList/'.$bookmark->post->id}}"
                    method="POST"
                >
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-link text-sm p-0">
                        <div class="badge badge-pill badge-danger">
                            Remove
                        </div>
                    </button>
                </form>
                {{-- <div class="badge badge-pill badge-danger">
                    <span class="text-sm">Remove</span>
                </div> --}}
            </div>
        </div>
        <div class="mb-2">
            {{$bookmark->post->excerpt}}
        </div>
        @if ($bookmark->collection)
            <div class="mb-2 text-white-50">
                Saved to 
                <span class="font-weight-bold text-white">
                    {{$bookmark->collection ??''}}
                </span>
            </div>
        @endif
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
        no {{request('type')}} bookmarks yet!
    @endforelse
</x-layouts.reading-list-layout>