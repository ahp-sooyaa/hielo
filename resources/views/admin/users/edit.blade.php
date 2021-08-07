<x-admin.layouts.app tab="users">
    <div class="col-md-12 px-0">
        <div class="card p-3">
            <h2 class="text-black-50 mb-3">
                Edit Users
            </h2>
            <form action="/admin/users/{{$user->id}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" value="{{$user->name}}">
                    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" value="{{$user->email}}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="roles">Assign Role (* optional you can edit later)</label>
                    <select name="roles" class="form-control">
                        <option disabled selected value> -- select an role -- </option>
                        @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary mr-3">Update</button>
                <a href="/admin/users">back</a>
            </form>
        </div>
    </div>
</x-admin.layouts.app>