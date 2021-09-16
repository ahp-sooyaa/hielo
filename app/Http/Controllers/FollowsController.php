<?php

namespace App\Http\Controllers;

use App\User;

class FollowsController extends Controller
{
    public function index()
    {
        $follows = auth_user()->follows->pluck('id');

        return response()->json(['follows' => $follows]);
    }

    public function store(User $user)
    {
        auth()->user()->toggleFollows($user);

        return 'successful';
    }

    public function following(User $user)
    {
        return view('profile.following', compact('user'));
    }

    public function follower(User $user)
    {
        return view('profile.follower', compact('user'));
    }
}
