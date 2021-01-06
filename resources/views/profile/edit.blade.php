<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <a class="text-muted" href="{{$user->path()}}" class="ml-2">
                    Profile
                </a>
                 / Setting
                <div class="card rounded-20 h-283-px p-4 position-relative mt-5">
                    <h5 class="font-weight-bold">Update Profile</h5>
                    <img 
                        class="rounded-circle avatar-2x mx-auto shadow-lg" 
                        src="{{ asset($user->avatar) }}" alt="Profile"
                    >
                    <form action="{{ $user->path() }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <div class="form-group pt-5">
                            <input type="file" name="avatar" class="@error('avatar') is-invalid @enderror border-0">
                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control @error('name') is-invalid @enderror border-bottom-1 border-0" name="name" type="text" value="{{$user->name}}" placeholder="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control @error('email') is-invalid @enderror border-bottom-1 border-0" name="email" type="text" value="{{$user->email}}" placeholder="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea 
                                class="form-control @error('short_bio') is-invalid @enderror border-bottom-1 border-0" name="short_bio" cols="50" rows="3" placeholder="Short bio"
                            >{{$user->short_bio ? $user->short_bio : ''}}
                            </textarea>
                            @error('short_bio')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-info py-1 ml-auto">
                            Save
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-7 my-5">
                <div class="card p-4 rounded-20">
                    <form action="/{{ $user->name }}/password" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <h5 class="font-weight-bold mb-3">Change Password</h5>
                        <div class="form-group">
                            <input class="form-control border-bottom-1 border-0 @error('password') is-invalid @enderror" name="password" type="password" placeholder="New Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control border-bottom-1 border-0" name="password_confirmation" type="password" placeholder="Confirm New Password">
                        </div>
                        <button type="submit" class="btn btn-outline-info py-1 ml-auto">
                            Save
                        </button>
                    </form>
                </div>
            </div>
            {{-- <div class="col-md-7">
                <div class="card border-danger p-4 rounded-20">
                    <form action="{{$user->path()}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div 
                            class="text-danger font-weight-bold"
                        >Delete Account</div>
                        <div class="my-2">
                            Once you delete your account, there is no going back. Please be certain.
                        </div>
                        <button type="submit" class="mr-auto btn btn-outline-danger border py-1">
                            Delete
                        </button>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</x-layouts.app>