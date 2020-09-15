<?php

namespace App\Http\Controllers\Admin;

use App\Ability;
use App\Http\Controllers\Controller;
use App\Role;

class RolesController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Role $role)
    {
        $attribute = request()->validate(['name' => 'required']);

        $role->create($attribute);

        return redirect('/admin/roles');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
            'abilities' => Ability::all()
        ]);
    }

    public function update(Role $role)
    {
        $attribute = request()->validate(['name']);

        $role->update($attribute);

        $role->abilities()->sync(request('abilities'));

        return redirect('/admin/roles');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back();
    }
}
