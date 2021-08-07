<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post as PostResource;
use App\Post;

class PostController extends Controller
{
    public function edit(Post $post)
    {
        return new PostResource($post);
    }
}
