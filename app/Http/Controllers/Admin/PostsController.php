<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
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
    public function store(StorePostRequest $request)
    {
        $attributes = request()->except(['tags']);

        $attributes['featured_image'] = request('featured_image')->store('featured-images');

        $post = auth_user()->posts()->create($attributes);

        $post->tags()->sync(request('tags'));

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post, StorePostRequest $request)
    {
        $attributes = request()->except(['tags']);

        if (request()->hasFile('featured_image')) {
            $attributes['featured_image'] = request('featured_image')->store('featured-images');
        }

        $post->update($attributes);

        $post->tags()->sync(request('tags'));

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }
}
