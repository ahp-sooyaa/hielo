<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Comment;
use App\Notifications\NewComment;
use App\Post;

class PostCommentsController extends Controller
{
    public function store(StoreCommentRequest $request, Post $post)
    {
        $comment = $post->addComment([
            'author_id' => auth()->id(),
            'body' => request('body')
        ]);

        foreach (auth_user()->followers as $follower) {
            // if ($ids->contains($this->author->id)) {
            $follower->notify(new NewComment($this, $comment));
            // }
        }

        $comment['avatar'] = auth_user()->avatar;
        $comment['author_name'] = auth_user()->name;

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
