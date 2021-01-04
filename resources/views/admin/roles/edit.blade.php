<x-admin.layouts.app tab="roles">
    <div class="card p-3">
        <h1>Edit Role</h1>
        <form action="/admin/roles/{{$role->id}}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <input class="form-control" type="text" placeholder="{{$role->name}}" readonly>
            </div>
            <div class="form-group">
                <input name="label" class="form-control @error('label') is-invalid @enderror" type="text" value="{{$role->label}}">
                @error('label')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <select name="abilities[]" class="form-control @error('abilities') is-invalid @enderror" multiple>
                    @foreach ($abilities as $ability)
                        <option value="{{$ability->id}}" {{ $role->abilities->contains($ability->id) ? 'selected' : '' }}>
                            {{$ability->label}}
                        </option>
                    @endforeach
                </select>
                @error('abilities')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="btn btn-primary mr-3">Update</button>
            <a href="/admin/roles">back</a>
        </form>
    </div>
</x-admin.layouts.app>