<x-admin.layouts.app>
    <div class="card p-3">
        {{-- <div class="mx-auto"> --}}
            <form action="/admin/profile/{{current_user()->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="d-flex">
                    <h3 class="text-muted mr-auto">Profile</h3>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="name">Avatar</label>
                    <div class="col-9">
                        <input name="avatar" class="form-control" type="file">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="name">User Name</label>
                    <div class="col-9">
                        <input class="form-control" name="name" value="{{current_user()->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Email</label>
                    <div class="col-9">
                    <input type="email" name="email" class="form-control" value="{{current_user()->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Bio</label>
                    <div class="col-9">
                    <textarea class="form-control" name="short_bio" cols="30" rows="5">{{current_user()->short_bio}}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Password</label>
                    <div class="col-9">
                    <input class="form-control" type="password" name="password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Password Confirmation</label>
                    <div class="col-9">
                    <input class="form-control" type="password" name="password_confirmation" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-3">Update</button>
                <a href="/admin/profile">back</a>
            </form>
        {{-- </div> --}}
    </div>
</x-admin.layouts.app>