<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    public function show(User $user)
    {
        //
    }

    public function create()
    {
        return view('admin.users.create', [
            'roles' => Role::all()
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $attributes = $request->validated();

        $attributes['password'] = Hash::make($attributes['password']);

        User::create($attributes);

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
