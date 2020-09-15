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
                            <input class="mb-3" type="file" name="avatar">
                            <input class="form-control mb-3" name="name" type="text" value="{{$user->name}}">
                            <textarea class="form-control" name="short_bio" cols="50" rows="3">
                                {{$user->short_bio ?? ''}}
                            </textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>