<x-admin.layouts.app tab="dashboard">
    <header class="sp-1">
        <h1>DashBoard</h1>
        <p class="text-black-50">Dashboard overview and content summary </p>
    </header>
    <div class="d-flex justify-content-between mx-n3 my-5">
        <div class="w-33 px-3">
            @include('admin.dashboard._users')
        </div>
        <div class="w-33 px-3">
            @include('admin.dashboard._posts')
        </div>
        <div class="w-33 px-3">
            @include('admin.dashboard._comments')
        </div>
    </div>
    <div class="row mx-n3">
        <div class="col-md-12 px-3">
            <div class="card p-3 mt-4">
                <chart></chart>
            </div>
        </div>
        <div class="mx-auto">
            @include('admin.dashboard._activityCard')
        </div>
    </div>
</x-admin.layouts.app>