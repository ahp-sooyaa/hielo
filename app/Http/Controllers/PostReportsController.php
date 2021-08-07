<?php

namespace App\Http\Controllers;

use App\Post;

class PostReportsController extends Controller
{
    public function create(Post $post)
    {
        return view('reports.post.create', compact('post'));
    }

    public function store(Post $post)
    {
        $post->report(request('description'));
        return back();
    }
}
