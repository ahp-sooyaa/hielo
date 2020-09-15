<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'featured_image' => 'required|mimes:jpeg,bmp,png,jpg',
            'published_at' => 'required'
        ]);

        $attributes['featured_image'] = request('featured_image')->store('featured-images');

        current_user()->posts()->create($attributes);

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
            'featured_image' => 'nullable|mimes:jpeg,bmp,png,jpg',
            'published_at' => 'required'
        ]);

        if (request('featured_image')) {
            $attributes['featured_image'] = request('featured_image')->store('featured-images');
        }

        $post->update($attributes);

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post  $post)
    {
        $post->delete();

        return back();
    }
}
