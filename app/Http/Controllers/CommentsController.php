<?php

namespace App\Http\Controllers;

use App\Post;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $post->addComment(request('body'));

        return redirect($post->path());
    }
}
