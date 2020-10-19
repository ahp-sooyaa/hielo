<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

class AuthorPostsController extends Controller
{
    public function index(User $user)
    {
        $this->authorize('access_route', $user);

        switch (request('type')) {
            case 'published':
                $posts = Post::where([
                    ['author_id', $user->id],
                    ['published_at', '<=', date('Y-m-d H:i:s')]
                ])->get();
                break;

            case 'scheduled':
                $posts = Post::where([
                    ['author_id', $user->id],
                    ['published_at', '>', date('Y-m-d H:i:s')]
                ])->get();
                break;

            case 'drafts':
                $posts = Post::where([
                    ['author_id', $user->id],
                    ['published_at', NULL]
                ])->get();
                break;

            case 'all':
                $posts = Post::orderBy('updated_at', 'desc')->where('author_id', $user->id)->get();
                break;
        };

        return view('posts.posts', compact('posts'));
    }
}
