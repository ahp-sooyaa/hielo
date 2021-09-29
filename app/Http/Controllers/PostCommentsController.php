<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Notifications\NewComment;
use App\Http\Requests\StoreCommentRequest;

class PostCommentsController extends Controller
{
    public function index(Post $post)
    {
        return $post->comments;
    }

    public function store(StoreCommentRequest $request, Post $post)
    {
        $comment = $post->comments()->create([
            'author_id' => auth()->id(),
            'body' => $request->body
        ])->load('author');

        auth_user()->followers->each->notify(new NewComment($this, $comment));

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
