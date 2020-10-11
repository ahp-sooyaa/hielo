<x-admin.layouts.app>
    <div class="card p-3">
        <header>
            <div class="d-flex align-items-center">
                <h1 class="mb-0 mr-3">Users</h1>
                <a href="/admin/users/create">
                    <button class="btn btn-sm btn-info">
                        + ADD NEW
                    </button>
                </a>
            </div>
            <p class="text-black-50">All of Users are shown in below</p>
        </header>
        <table id="datatable" class="table table-striped table-responsive-md">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered_at</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name, 50 }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <span class="badge badge-success">
                                {{ $user->roles->pluck('name')->join('') }}
                            </span>
                        </td>
                        <td class="d-flex">
                            <a href="/admin/users/{{$user->id}}/edit" class="mr-3">
                                <button class="btn btn-sm btn-link" name="delete">
                                    <i class="fas fa-pen text-primary"></i>
                                </button>
                            </a>
                            @can('delete', $user)
                                <form action="/admin/users/{{$user->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
        
                                    <button class="btn btn-sm btn-info" type="submit" name="delete">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5">no users yet!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>
