<x-admin.layouts.app tab="profile">
    <div class="card p-3">
        <div class="mx-auto">
            <header class="d-flex align-items-center mb-4">
                <img class="avatar-2x mr-5" src="{{current_user()->avatar}}" alt="">
                <div>
                    <div class="d-flex align-items-center">
                        <h1 class="mr-auto">{{current_user()->name}}</h1>
                        <a href="/admin/profile/edit">
                            <button class="btn btn-sm btn-outline-info">Edit</button>
                        </a>
                    </div>
                    {{current_user()->email}}
                    - <span class="text-success">{{current_user()->roles[0]->label}}</span>
                    <p class="text-black-50">{{current_user()->short_bio}}</p>
                    </div>
            </header>
        </div>
    </div>
</x-admin.layouts.app>