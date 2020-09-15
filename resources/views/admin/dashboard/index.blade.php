<x-admin.layouts.app>
    <header class="text-white">
        <h1>DashBoard</h1>
        <p class="text-white-50">Dashboard overview and content summary </p>
    </header>
    <div class="d-flex justify-content-between mx-n3 text-white mt-5">
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
    <div class="container p-0">
        <div class="row mx-m3">
            <div class="col-8 px-3">
                <div class="card p-3 mt-4">
                    <chart-component></chart-component>
                </div>
            </div>
            <div class="col-4 px-3">
                @include('admin.dashboard._activityCard')
            </div>
        </div>
    </div>
</x-admin.layouts.app>