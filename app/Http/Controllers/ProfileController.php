<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
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

    public function update(User $user, StoreUserRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($request->validated());

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
