<?php

namespace App\Http\Controllers\Admin;

use App\Ability;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Http\Requests\RoleRequest;

class RolesController extends Controller
{
    public function index()
    {
        /* i'm bored to write too many policy, just used 'access_roles' :) */
        $this->authorize('access_roles', User::class);

        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        $this->authorize('access_roles', User::class);

        return view('admin.roles.create', [
            'abilities' => Ability::all()
        ]);
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('access_roles', User::class);

        $role = Role::create(request(['name', 'label']));

        $role->abilities()->sync(request('abilities'));

        return redirect('/admin/roles');
    }

    public function edit(Role $role)
    {
        $this->authorize('access_roles', User::class);

        return view('admin.roles.edit', [
            'role' => $role,
            'abilities' => Ability::all()
        ]);
    }

    public function update(Role $role, RoleRequest $request)
    {
        $this->authorize('access_roles', User::class);

        $role->update(request(['label']));

        $role->abilities()->sync(request('abilities'));
        // $role->allowTo(request('abilities'));

        return redirect('/admin/roles');
    }

    public function destroy(Role $role)
    {
        $this->authorize('access_roles', User::class);

        $role->delete();

        return back();
    }
}
