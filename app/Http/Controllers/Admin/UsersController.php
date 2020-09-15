<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::paginate(3)
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user->create($attributes);

        return redirect('/admin/users');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user->update($attributes);

        $user->assignRole(request('role'));

        return redirect('/admin/users');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
