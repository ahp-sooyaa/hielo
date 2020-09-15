<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'short_bio' => 'nullable|string|max:160',
            'avatar' => 'nullable|mimes:jpeg,bmp,png,jpg',
            'password' => 'required|confirmed|min:8'
        ]);

        if (request()->hasFile('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect('/admin/profile');
    }
}
