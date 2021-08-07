<x-admin.layouts.app tab="roles">
    <div class="card p-3">
        <h1>Create Role</h1>
        <form action="/admin/roles" method="POST">
            @csrf

            <div class="form-group">
                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Role name" value="{{old('name')}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input name="label" class="form-control @error('label') is-invalid @enderror" type="text" placeholder="Role label" value="{{old('label')}}">
                @error('label')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <select name="abilities[]" class="form-control @error('abilities') is-invalid @enderror" multiple>
                    @foreach ($abilities as $ability)
                        <option value="{{$ability->id}}">{{$ability->label}}</option>
                    @endforeach
                </select>
                @error('abilities')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button class="btn btn-primary mr-3">Create</button>
            <a href="/admin/roles">back</a>
        </form>
    </div>
</x-admin.layouts.app>