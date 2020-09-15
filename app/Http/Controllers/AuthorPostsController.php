<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

class AuthorPostsController extends Controller
{
    public function index(User $user)
    {
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
                $posts = Post::where('author_id', $user->id)->get();
                break;
        };
        return view('posts.posts', compact('posts'));
    }

    public function destroy($postId)
    {
        current_user()->posts()->where('id', $postId)->delete($postId);

        return back();
    }
}
