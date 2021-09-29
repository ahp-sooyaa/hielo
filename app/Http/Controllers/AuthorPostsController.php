<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

class AuthorPostsController extends Controller
{
    public function __invoke(User $user)
    {
        $this->authorize('index', $user);
        
        $posts = Post::latest('updated_at')->where('author_id', $user->id);
        
        if (request('type') == 'published') {
            $posts->where('published_at', '<=', now());
        } 
        if (request('type') == 'scheduled') {
            $posts->where('published_at', '>', now());
        } 
        
        return view('posts.posts', [ 'posts' => $posts->paginate(3) ]);
    }
}
