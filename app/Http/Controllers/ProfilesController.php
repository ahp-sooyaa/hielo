<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('edit_user', $user);

        return view('profile.edit', compact('user'));
    }

    public function update(StoreUserRequest $request, User $user)
    {
        $this->authorize('edit_user', $user);

        $attributes = $request->validated();

        if ($request->hasFile('avatar')) {
            $attributes['avatar'] = $request->avatar->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/login');
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
