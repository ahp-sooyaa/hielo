<x-admin.layouts.app>
    <div class="card p-3">
        <header class="text-dark">
            <div class="d-flex align-items-center">
                <h1 class="my-0 mr-3">Posts</h1>
                <a href="/admin/posts/create">
                    <button class="btn btn-sm btn-primary shadow">
                        + ADD NEW
                    </button>
                </a>
            </div>
            <p class="text-dark-50">All Posts are shown in below</p>
        </header>
        <table class="table table-striped table-hover table-responsive-md">
            <caption>
                <span class="text-dark font-weight-bold">
                    {{ $posts->count() }}
                </span> rows of total
            </caption>
            <thead>
                <tr>
                    {{-- multi language is not yet @lang('posts.attributes.post') --}}
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Content</th>
                    <th>Featured Image</th>
                    <th>Published at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ Str::limit($post->title, 50) }}</td>
                        <td>{{ $post->excerpt }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <img 
                                class="rounded-20 featured-image shadow" 
                                src="{{ $post->featured_image }}" alt="featured_image"
                            >
                        </td>
                        <td>{{ $post->published_at }}</td>
                        <td class="d-flex">
                            <a class="mr-2" href="/admin/posts/{{$post->id}}/edit">
                                <button class="btn btn-info" type="submit" name="delete">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </a>
                            <form action="/admin/posts/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="btn btn-danger" type="submit" name="delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="6">no posts yet!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $posts->links() }}
    </div>
</x-admin.layouts.app>