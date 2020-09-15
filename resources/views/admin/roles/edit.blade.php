<x-admin.layouts.app>
    <div class="card p-3">
        <h1>Edit Role</h1>
        <form action="/admin/roles/{{$role->id}}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <input name="name" class="form-control" type="text" value="{{$role->name}}">
            </div>
            <div class="form-group">
                <select name="abilities[]" multiple>
                    @foreach ($abilities as $ability)
                        <option value="{{$ability->id}}">{{$ability->label}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mr-3">Update</button>
            <a href="/admin/roles">back</a>
        </form>
    </div>
</x-admin.layouts.app>