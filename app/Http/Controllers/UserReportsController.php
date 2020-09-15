<?php

namespace App\Http\Controllers;

use App\User;

class UserReportsController extends Controller
{
    public function create(User $user)
    {
        return view('reports.user.create', compact('user'));
    }

    public function store(User $user)
    {
        $user->report(request('description'));
        return back();
    }
}
