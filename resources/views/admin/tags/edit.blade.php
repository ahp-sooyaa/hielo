<x-admin.layouts.app tab="tags">
    <div class="card p-3">
        <h1>Edit Tag</h1>
        <form action="/admin/tags/{{$tag->id}}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{$tag->name}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="btn btn-primary mr-3">Update</button>
            <a href="/admin/abilities">back</a>
        </form>
    </div>
</x-admin.layouts.app>