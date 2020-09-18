<?php

namespace App\Http\Controllers;

use App\Notifications\PostPublished;
use App\Post;
use App\Tag;

class PostsController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $posts = Tag::where('name', request('tag'))->firstOrFail()->posts;
        } else {
            $posts = auth()->user()->timeline();
        }

        return view('posts.index', compact('posts'));
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

    public function store()
    {
        switch (request()->input('action')) {
            case 'Draft':
                $attributes = request()->except('action', 'published_at', 'tags');
                break;

            case 'Publish':
                $attributes = request()->validate([
                    'title' => 'required',
                    'excerpt' => 'required',
                    'content' => 'required',
                    'featured_image' => 'required|mimes:jpeg,bmp,png,jpg',
                    'published_at' => 'required'
                ]);
                break;
        };
        if (request('featured_image')) {
            $attributes['featured_image'] = request('featured_image')->store('featured-images');
        }

        $post = current_user()->posts()->create($attributes);

        $post->tags()->attach(request('tags'));

        foreach (current_user()->followers as $follower) {
            $follower->notify(new PostPublished($post));
        }

        return redirect('/posts')->with('status', 'Post Published');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        /* does validation requrie? */
        $attributes = request()->validate([
            'title' => 'nullable',
            'excerpt' => 'nullable',
            'content' => 'nullable',
            'featured_image' => 'nullable|mimes:jpeg,bmp,png,jpg'
        ]);

        if (request()->hasFile('featured_image')) {
            $attributes['featured_image'] = request('featured_image')->store('featured_images');
        }

        $post->update($attributes);

        return redirect(current_user()->name . '/posts?type=all');
    }

    public function delete(Post $post)
    {
        # code ...
    }
}
