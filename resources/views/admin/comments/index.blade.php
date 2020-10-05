<x-admin.layouts.app>
    <div class="card p-3">
        <header class="text-black">
            <h1>Comments</h1>
            <p class="text-dark-50">All of comments are shown in below</p>
        </header>
        <table id="datatable" class="table table-striped table-responsive-md">
            <thead>
                <tr>
                    {{-- multi language is not yet @lang('comments.attributes.post') --}}
                    <th>Comments</th>
                    <th>Posts</th>
                    <th>Author</th>
                    <th>Posted_at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($comments as $comment)
                    <tr>
                        <td>{{ Str::limit($comment->body, 5) }}</td>
                        <td>{{ $comment->post->title }}</td>
                        <td>{{ $comment->author->name }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td class="d-flex">
                            <a class="mr-3" href="/admin/comments/{{$comment->id}}/edit">
                                <button class="btn btn-info" type="submit" name="delete">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </a>
                            <form action="/admin/comments/{{$comment->id}}" method="POST">
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
                        <td colspan="5">no comments yet!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>