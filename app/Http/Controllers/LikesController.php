<?php

namespace App\Http\Controllers;

use App\Post;

class LikesController extends Controller
{
    public function store(Post $post)
    {
        if ($post->isLiked()) {
            $post->dislike();
        } else {
            $post->like();
        }

        return back();
    }
}
