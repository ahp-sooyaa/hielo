<x-admin.layouts.app tab="comments">
    <div class="card p-3">
        <header>
            <h1>Comments</h1>
            <p class="text-black-50">All of comments are shown in below</p>
        </header>
        <table id="datatable" class="table table-striped table-responsive-md">
            <thead>
                <tr>
                    <th>Author</th>
                    <th>Commented</th>
                    <th>To: Post Title</th>
                    <th>Commented_at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($comments as $comment)
                    <tr>
                        <td>{{ $comment->author->name }}</td>
                        <td>{{ $comment->body }}</td>
                        <td>{{ $comment->post->title }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td class="d-flex">
                            <a class="mr-3" href="/admin/comments/{{$comment->id}}/edit">
                                <button class="btn btn-sm btn-link" type="submit" name="delete">
                                    <i class="fas fa-pen text-primary"></i>
                                </button>
                            </a>
                            <form action="/admin/comments/{{$comment->id}}" method="POST">
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
                        <td colspan="5">no comments yet!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>