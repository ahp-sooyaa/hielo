<x-admin.layouts.app>
    <div class="col-md-5">
        <div class="card p-3">
            <h1 class="text-black-50">
                Add Users
            </h1>
            <form action="/admin/users" method="POST">
                @csrf
                <div class="form-group">
                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" placeholder="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="text" placeholder="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control" name="password_confirmation" type="text" placeholder="password confirmation">
                </div>
        
                <input class="btn btn-primary mr-3" type="submit" value="Create">
                <a href="/admin/users">back</a>
            </form>
        </div>
    </div>
</x-admin.layouts.app>