<x-admin.layouts.app tab="abilities">
    <div class="card p-3">
        <h1>Create Ability</h1>
        <form action="/admin/abilities" method="POST">
            @csrf

            <div class="form-group">
                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Ability name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="label" class="form-control @error('label') is-invalid @enderror" type="text" placeholder="Ability label">
                @error('label')
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