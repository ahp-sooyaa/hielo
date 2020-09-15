<x-admin.layouts.app>
    <div class="col-md-5">
        <div class="card p-3">
            <h1 class="text-black-50">
                Edit Users
            </h1>
            <form action="/admin/users/{{$user->id}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input class="form-control" name="name" type="text" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <input class="form-control" name="email" type="text" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <select name="role">
                        @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary mr-3">Update</button>
                <a href="/admin/users">back</a>
            </form>
        </div>
    </div>
</x-admin.layouts.app>