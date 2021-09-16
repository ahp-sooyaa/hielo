<x-admin.layouts.app tab="profile">
    <div class="card p-3">
        {{-- <div class="mx-auto"> --}}
            <form action="/admin/profile/{{auth_user()->id}}" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{auth_user()->name}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-3 col-form-label">Email</label>
                    <div class="col-9">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{auth_user()->email}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="short_bio" class="col-3 col-form-label">Bio</label>
                    <div class="col-9">
                        <textarea class="form-control @error('short_bio') is-invalid @enderror" name="short_bio" cols="30" rows="5">{{auth_user()->short_bio}}</textarea>
                        @error('short_bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-3">Update</button>
                <a href="/admin/profile">back</a>
            </form>
        {{-- </div> --}}
    </div>
</x-admin.layouts.app>