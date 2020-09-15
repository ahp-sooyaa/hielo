<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'short_bio' => 'nullable|string|max:160',
            'avatar' => 'nullable|mimes:jpeg,bmp,png,jpg'
        ]);

        if (request()->hasFile('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());
    }

    public function likes(User $user)
    {
        return view('profile.likes', compact('user'));
    }

    public function comments(User $user)
    {
        return view('profile.comments', compact('user'));
    }
}
