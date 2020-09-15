<x-layouts.app>
    <div class="container">
        <h4 class="text-white-50 mb-3 mt-4">Your Posts</h4>
        <div class="row">
            <div class="col-md-2 mr-5">
                {{-- <input type="text" placeholder="Search" class="form-control border-0"> --}}
                <a href="/posts/create">
                    <button
                        class="btn btn-secondary w-100 rounded-pill"
                    >Create Post</button>
                </a>
                <div class="vertical-menu rounded-20 mx-auto mt-3 py-3 px-4">
                    <a 
                        href="/{{current_user()->name}}/posts?type=all"
                        class="{{ (request('type')=='all' ) ? 'active' : '' }}"
                    >All</a>
                    <a 
                        href="/{{current_user()->name}}/posts?type=drafts"
                        class="{{ (request('type')=='drafts' ) ? 'active' : '' }}"
                    >Drafts</span></a>
                    <a 
                        href="/{{current_user()->name}}/posts?type=published" 
                        class="{{ (request('type')=='published' ) ? 'active' : '' }}"
                    >Published</a>
                    <a 
                        href="/{{current_user()->name}}/posts?type=scheduled"
                        class="{{ (request('type')=='scheduled' ) ? 'active' : '' }}"
                    >Scheduled</a>
                </div>
            </div>
            <div class="col-md-8">
                @forelse ($posts as $post)
                <div class="border-left-3 mb-5 px-4 w-75 text-white-50">
                    <div class="d-flex justify-content-between">
                        <h5>
                            <a href="{{ $post->path().'/edit' }}" class="text-white text-decoration-none">
                                {{$post->title ?: 'Untitled post'}}
                            </a>
                        </h5>
                        <div>
                            <form 
                                action="{{'/posts/'.$post->id}}"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link text-sm p-0">
                                    <div class="badge badge-pill badge-danger">
                                        Delete
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="mb-2">
                        {{$post->excerpt}}
                    </div>
                    <div class="d-flex justify-content-between">
                        @if ($post->isEdited())
                            <div>Last Edited {{$post->updated_at->diffForHumans()}}</div>
                        @else 
                            <div>Created {{$post->created_at->diffForHumans()}}</div>
                        @endif
                    </div>
                </div>
                @empty
                    <div class="text-center">
                        <h4>No {{request('type')}} Posts!</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.app>