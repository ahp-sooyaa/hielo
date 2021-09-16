<x-admin.layouts.app tab="profile">
    <div class="card p-3">
        <div class="mx-auto">
            <header class="d-flex align-items-center mb-4">
                <img class="avatar-2x mr-5" src="{{auth_user()->avatar}}" alt="">
                <div>
                    <div class="d-flex align-items-center">
                        <h1 class="mr-auto">{{auth_user()->name}}</h1>
                        <a href="/admin/profile/edit">
                            <button class="btn btn-sm btn-outline-info">Edit</button>
                        </a>
                    </div>
                    {{auth_user()->email}}
                    - <span class="text-success">{{auth_user()->roles[0]->label}}</span>
                    <p class="text-black-50">{{auth_user()->short_bio}}</p>
                    </div>
            </header>
        </div>
    </div>
</x-admin.layouts.app>