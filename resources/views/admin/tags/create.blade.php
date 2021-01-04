<x-admin.layouts.app tab="tags">
    <div class="card p-3">
        <h1>Create Tag</h1>
        <form action="/admin/tags" method="POST">
            @csrf

            <div class="form-group">
                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Tag name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="btn btn-primary mr-3">Create</button>
            <a href="/admin/abilities">back</a>
        </form>
    </div>
</x-admin.layouts.app>