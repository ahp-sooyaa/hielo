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
        $dates = Activity::latest()->take(30)->get()->groupBy(function ($activity) {
            return $activity->created_at->format('Y-M-d');
        });

        return view('admin.dashboard.index', [
            'posts' => Post::all(),
            'users' => User::all(),
            'comments' => Comment::all(),
            'dates' => $dates
        ]);
    }
}
