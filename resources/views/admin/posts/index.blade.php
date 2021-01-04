<x-admin.layouts.app tab="posts">
    <div class="card p-3">
        <header>
            <div class="d-flex align-items-center">
                <h1 class="my-0 mr-3">Posts</h1>
                <a href="/admin/posts/create">
                    <button class="btn btn-sm btn-info">
                        + ADD NEW
                    </button>
                </a>
            </div>
            <p class="text-black-50">All Posts are shown in below</p>
        </header>
        <table id="datatable" class="table table-striped table-hover table-responsive-md">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Excerpt</th>
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
                        <td>
                            <img 
                                class="rounded-20 featured-image shadow" 
                                src="{{ $post->featured_image }}" alt="featured_image"
                            >
                        </td>
                        <td>{{ $post->published_at }}</td>
                        <td class="d-flex">
                            <a class="mr-2" href="/admin/posts/{{$post->id}}/edit">
                                <button class="btn btn-sm btn-link" type="submit" name="delete">
                                    <i class="fas fa-pen text-primary"></i>
                                </button>
                            </a>
                            <form action="/admin/posts/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="btn btn-sm btn-link" type="submit" name="delete">
                                    <i class="fas fa-trash text-danger"></i>
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
    </div>
</x-admin.layouts.app>