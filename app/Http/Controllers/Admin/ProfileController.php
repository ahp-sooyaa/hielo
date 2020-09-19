<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('admin.profile.index', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.profile.edit', compact('user'));
    }

    public function update(User $user, StoreUserRequest $request)
    {
        if (request()->hasFile('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($request->validated());

        return redirect('/admin/profile');
    }
}
