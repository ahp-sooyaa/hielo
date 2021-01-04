<x-admin.layouts.app tab="roles">
    <div class="card p-3">
        <header>
            <div class="d-flex align-items-center">
                <h1 class="mb-0 mr-3">Roles</h1>
                <a href="/admin/roles/create">
                    <button class="btn btn-sm btn-info">
                        + ADD NEW
                    </button>
                </a>
            </div>
            <p class="text-dark-50">All Roles are shown in below</p>
        </header>
        <table id="datatable" class="table table-striped table-hover table-responsive-md">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Label</th>
                    <th>Abilities</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->label }}</td>
                        <td>
                            @foreach ($role->abilities as $ability)
                                <span class="badge badge-success">
                                    {{ $ability->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="d-flex">
                            <a class="mr-2" href="/admin/roles/{{$role->id}}/edit">
                                <button class="btn btn-sm btn-link" type="submit" name="delete">
                                    <i class="fas fa-pen text-primary"></i>
                                </button>
                            </a>
                            <form action="/admin/roles/{{$role->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="btn btn-sm btn-link" type="submit" name="delete">
                                    <i class="fas fa-trash text-danger"></i>
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