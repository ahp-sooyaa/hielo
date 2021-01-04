<x-admin.layouts.app tab="abilities">
    <div class="card p-3">
        <h1>Edit Ability</h1>
        <form action="/admin/abilities/{{$ability->id}}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Ability Name (* readonly)</label>
                <input class="form-control" type="text" placeholder="{{$ability->name}}" readonly>
            </div>
            <div class="form-group">
                <label for="label">Ability Label</label>
                <input name="label" class="form-control @error('label') is-invalid @enderror" type="text" value="{{$ability->label}}">
                @error('label')
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