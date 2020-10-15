<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Notifications\PostPublished;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $posts = Tag::where('name', request('tag'))
                ->firstOrFail()
                ->posts->where('published_at', '<=', date('Y-m-d H:i:s'));
        } else {
            $posts = auth()->user()->timeline();
        }

        return view('posts.index', [
            'posts' => $posts,
            'tags' => Tag::has('posts')->get()
        ]);
    }

    public function show(Post $post)
    {
        request()->session()->push('posts.recently_viewed', $post->getKey());

        return view('posts.show', [
            'post' => $post,
            'relatedPosts' => $post->relatedPosts()
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $attributes = $request->validated();

        if ($request->hasFile('featured_image')) {
            $attributes['featured_image'] = request('featured_image')->store('featured-images');
        }

        $post = current_user()->posts()->create($attributes);

        $tags = json_decode(request('tags'));

        foreach ($tags as $tag) {
            $tagsId[$tag->id] = ['tag_id' => $tag->id];
        }

        $post->tags()->sync($tagsId);

        foreach (current_user()->followers as $follower) {
            $follower->notify(new PostPublished($post));
        }

        return response()->json(['postId' => $post->id]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $attributes = $request->validated();

        if (request()->hasFile('featured_image')) {
            $attributes['featured_image'] = request('featured_image')->store('featured_images');
        }

        $post->update($attributes);

        $tags = json_decode(request('tags'));

        foreach ($tags as $tag) {
            $tagsId[$tag->id] = ['tag_id' => $tag->id];
        }

        $post->tags()->sync($tagsId);

        // return redirect(current_user()->name . '/posts?type=all');
        return response()->json(['postId' => $post->id]);
    }

    public function delete(Post $post)
    {
        # code ...
    }
}
