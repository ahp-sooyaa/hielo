<x-admin.layouts.app>
    <div class="card p-3">
        <div class="mx-auto">
            <header class="d-flex align-items-center mb-4">
                <img class="avatar-2x mr-5" src="{{current_user()->avatar}}" alt="">
                <div>
                    <div class="d-flex align-items-center">
                        <h1 class="mr-auto">{{current_user()->name}}</h1>
                        <a href="/admin/profile/edit">
                            <button class="btn btn-sm btn-outline-primary">Edit</button>
                        </a>
                    </div>
                    {{current_user()->email}}
                    - <span class="text-success">{{current_user()->roles[0]->label}}</span>
                    <p class="text-black-50">{{current_user()->short_bio}}</p>
                    </div>
            </header>
            {{-- <div>
                <div class="d-flex">
                    <h3 class="text-muted mr-auto">Profile</h3>
                    <a href="/admin/profile/edit">
                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                    </a>
                </div>
                <div class="form-group row">
                    <label class="col-3 col-form-label" for="name">User Name</label>
                    <div class="col-9">
                        <input type="text" readonly class="form-control-plaintext" value="{{current_user()->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Email</label>
                    <div class="col-9">
                        <input type="text" readonly class="form-control-plaintext" value="{{current_user()->email}}">
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</x-admin.layouts.app>