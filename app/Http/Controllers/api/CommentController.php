<?php

namespace App\Http\Controllers\api;

use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\Comment as CommentResource;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        return CommentResource::collection(
            $post->comments()->get()
        );
    }
}
