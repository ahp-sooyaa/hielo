<x-admin.layouts.app>
    <div class="col-md-5">
        <div class="card p-3">
            <h1 class="text-black-50">
                Add Users
            </h1>
            <form action="/admin/users" method="POST">
                @csrf
                <div class="form-group">
                    <input class="form-control" name="name" type="text" placeholder="Name">
                </div>
                <div class="form-group">
                    <input class="form-control" name="email" type="text" placeholder="email">
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" type="text" placeholder="password">
                </div>
        
                <input class="btn btn-primary mr-3" type="submit" value="Create">
                <a href="/admin/users">back</a>
            </form>
        </div>
    </div>
</x-admin.layouts.app>