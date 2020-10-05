<x-admin.layouts.app>
    <div class="card p-3">
        <header class="text-dark">
            <div class="d-flex align-items-center">
                <h1 class="my-0 mr-3">Roles</h1>
                <a href="/admin/roles/create">
                    <button class="btn btn-sm btn-primary shadow">
                        + ADD NEW
                    </button>
                </a>
            </div>
            <p class="text-dark-50">All Roles are shown in below</p>
        </header>
        <table id="datatable" class="table table-striped table-hover table-responsive-md">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role Name</th>
                    <th>Abilities</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->abilities as $ability)
                                <span class="badge badge-success">
                                    {{ $ability->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="d-flex">
                            <a class="mr-2" href="/admin/roles/{{$role->id}}/edit">
                                <button class="btn btn-info" type="submit" name="delete">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </a>
                            <form action="/admin/roles/{{$role->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="btn btn-danger" type="submit" name="delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="4">no roles yet!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>