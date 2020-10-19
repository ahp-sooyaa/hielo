<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use App\Http\Requests\StoreCommentRequest;

class CommentsController extends Controller
{
    /**
     * Show the application comments index.
     */
    public function index()
    {
        return view('admin.comments.index', [
            'comments' => Comment::all()
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
    public function update(Comment $comment, StoreCommentRequest $request)
    {
        $comment->update($request->validated());

        return redirect('/admin/comments')->with('status', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('status', 'successfully deleted');
    }
}
