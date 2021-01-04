<x-admin.layouts.app tab="users">
    <div class="col-md-12 px-0">
        <div class="card p-3">
            <h1 class="text-black-50">
                Add Users
            </h1>
            <form action="/admin/users" method="POST">
                @csrf
                <div class="form-group">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Name" value="{{old('name')}}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" placeholder="email" value="{{old('email')}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control" name="password_confirmation" type="password" placeholder="password confirmation">
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
        
                <input class="btn btn-primary mr-3" type="submit" value="Create">
                <a href="/admin/users">back</a>
            </form>
        </div>
    </div>
</x-admin.layouts.app>