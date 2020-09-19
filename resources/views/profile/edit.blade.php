<x-layouts.app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <img 
                    class="rounded-circle position-absolute profile mx-auto shadow-lg" 
                    src="{{ asset($user->avatar) }}" alt="Profile"
                >
                <div class="card rounded-20 h-283-px p-4 text-primary position-relative mt-5">
                    <form action="{{ $user->path() }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex align-items-center mb-5">
                            <button type="submit" class="btn btn-sm btn-outline-success py-0">
                                Save
                            </button>
                            <a href="{{$user->path()}}" class="ml-2">
                                Cancel
                            </a>
                        </div>
                        <div class="text-center w-50 mx-auto pt-5">
                            <div class="form-group">
                                <input type="file" name="avatar">
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="name" type="text" value="{{$user->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="short_bio" cols="50" rows="3">
                                    {{$user->short_bio ?? ''}}
                                </textarea>
                                @error('short_bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>