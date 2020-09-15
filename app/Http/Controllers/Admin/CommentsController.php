<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;

class CommentsController extends Controller
{
    /**
     * Show the application comments index.
     */
    public function index()
    {
        return view('admin.comments.index', [
            'comments' => Comment::paginate(3)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Comment $comment)
    {
        $attribute = request()->validate(['body' => 'required']);

        // update method won't work with object, require array
        $comment->update($attribute);

        return redirect('/admin/comments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
