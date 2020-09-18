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

        $post->addComment([
            'author_id' => auth()->id(),
            'body' => request('body')
        ]);

        return redirect($post->path())->with('status', 'Comment success');
    }
}
