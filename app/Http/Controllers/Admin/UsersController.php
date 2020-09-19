<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
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

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        return redirect('/admin/users');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(User $user, StoreUserRequest $request)
    {
        $user->update($request->validated());

        $user->assignRole(request('role'));

        return redirect('/admin/users');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
