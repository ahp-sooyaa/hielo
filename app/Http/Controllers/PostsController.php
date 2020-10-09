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
                ->posts->whereNotNull('published_at');
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

        $post->tags()->sync($tags);

        foreach (current_user()->followers as $follower) {
            $follower->notify(new PostPublished($post));
        }

        return redirect('/posts')->with('status', 'Post Published');
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

        $post->tags()->sync($tags);

        return redirect(current_user()->name . '/posts?type=all');
    }

    public function delete(Post $post)
    {
        # code ...
    }
}
