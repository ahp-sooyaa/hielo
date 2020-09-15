<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        // $this->authorize('access_admin_panel', current_user());
        // return Activity::latest()->get();
        return view('admin.dashboard.index', [
            'posts' => Post::all(),
            'users' => User::all(),
            'comments' => Comment::all(),
            'activities' => Activity::latest()->get()
        ]);
    }
}
