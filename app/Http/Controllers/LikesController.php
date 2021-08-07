<?php

namespace App\Http\Controllers;

use App\Post;

class LikesController extends Controller
{
    public function __invoke(Post $post)
    {
        if ($post->isLiked()) {
            $post->dislike();
        } else {
            $post->like();
        }
    }
}
