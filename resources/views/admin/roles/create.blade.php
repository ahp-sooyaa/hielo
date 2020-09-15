<x-admin.layouts.app>
    <div class="card p-3">
        <h1>Create Role</h1>
        <form action="/admin/roles" method="POST">
            @csrf

            <div class="form-group">
                <input name="name" class="form-control" type="text" placeholder="Role name">
            </div>
            <button class="btn btn-primary mr-3">Create</button>
            <a href="/admin/roles">back</a>
        </form>
    </div>
</x-admin.layouts.app>