<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Comment;
use App\Notifications\NewComment;
use App\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post, StoreCommentRequest $request)
    {
        $comment = $post->addComment([
            'author_id' => auth()->id(),
            'body' => request('body')
        ]);

        $comment['avatar'] = current_user()->avatar;
        $comment['author_name'] = current_user()->name;

        return $comment;
    }

    public function update(Comment $comment)
    {
        $comment->update(request(['body']));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
