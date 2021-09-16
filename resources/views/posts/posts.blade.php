<x-layouts.app>
    <div class="container">
        <h4 class="text-dark-50 mb-3 mt-4">Your Posts</h4>
        <div class="row">
            <div class="col-md-2 mr-5">
                <a href="/posts/create">
                    <button class="btn btn-info w-100 rounded-pill">
                        <i class="fas fa-plus"></i> New Post
                    </button>
                </a>
                <div class="border border-info bg-white rounded-20 mt-3 py-3 px-4">
                    <ul class="list-group">
                        <li class="list-item">
                            <a 
                                class="d-block {{ (request('type')=='all' ) ? 'active' : '' }} py-2 px-3"
                                href="/{{auth_user()->name}}/posts?type=all"
                            >All</a>
                        </li>
                        <li class="list-item">
                            <a 
                                class="d-block {{ (request('type')=='published' ) ? 'active' : '' }} py-2 px-3"
                                href="/{{auth_user()->name}}/posts?type=published"
                            >Published</a>
                        </li>
                        <li class="list-item">
                            <a 
                                class="d-block {{ (request('type')=='scheduled' ) ? 'active' : '' }} py-2 px-3"
                                href="/{{auth_user()->name}}/posts?type=scheduled"
                            >Scheduled</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                @forelse ($posts as $post)
                <div class="card shadow border-0 rounded-20 border-left-3 mb-5 p-4 text-dark-50">
                    <div class="d-flex justify-content-between">
                        <h5>
                            <a href="{{ $post->path().'/edit' }}" class="text-dark font-weight-bolder text-decoration-none">
                                {{$post->title ?: 'Untitled post'}}
                            </a>
                        </h5>
                        <div>
                            <form action="{{'/posts/'.$post->id}}" method="POST">
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
                    <div class="mb-1 font-weight-thin">
                        {{ str_limit($post->excerpt, 80)}}
                    </div>
                    <div class="d-flex justify-content-between text-muted">
                        @if ($post->isEdited())
                            <div>Last Edited {{$post->updated_at->format('M d,Y')}}</div>
                        @else 
                            <div>Created {{$post->created_at->format('M d,Y')}}</div>
                        @endif
                    </div>
                </div>
                @empty
                    <div class="text-center">
                        <span>No {{request('type')}} Posts!</span>
                    </div>
                @endforelse
                {{$posts->links()}}
            </div>
        </div>
    </div>
</x-layouts.app>