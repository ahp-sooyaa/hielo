<x-layouts.reading-list-layout :user="$user">
    @forelse ($user->unArchievedBookmarks as $bookmark)
    <div class="card shadow rounded-20 border-0 border-left-3 mb-5 p-4 text-black-50">
        <div class="d-flex justify-content-between">
            <h5 class="mr-3">
                <a href="{{ $bookmark->post->path() }}" class="font-weight-bold">
                    {{$bookmark->post->title}}
                </a>
            </h5>
            <div class="d-flex">
                <form 
                    action="{{'/readingList/'.$bookmark->post->id}}"
                    method="POST"
                >
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-link text-sm p-0 mr-2">
                        <div class="badge badge-pill badge-success">
                            Archieve
                        </div>
                    </button>
                </form>
                <form 
                    action="{{'/readingList/'.$bookmark->post->id}}"
                    method="POST"
                >
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link text-sm p-0">
                        <div class="badge badge-pill badge-danger">
                            Remove
                        </div>
                    </button>
                </form>
            </div>
        </div>
        <div class="mb-2">
            {{ str_limit($bookmark->post->excerpt, 80)}}
        </div>
        @if ($bookmark->collection)
            <div class="mb-2">
                Saved to 
                <span class="font-weight-bold">
                    {{$bookmark->collection ??''}}
                </span>
            </div>
        @endif
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <img src="{{ asset('avatars/default.jpg') }}" alt="avatar" class="avatar">
                <span class="font-weight-bold ml-2">
                    <a href="{{$bookmark->post->author->path()}}">
                        {{$bookmark->post->author->name}}
                    </a>
                </span>
            </div>
            <div>
                {{$bookmark->created_at->diffForHumans(null, true, true)}}
            </div>
        </div>
    </div>
    @empty
        no bookmarks yet!
    @endforelse
</x-layouts.reading-list-layout>