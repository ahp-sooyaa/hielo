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
            $posts = Post::latest()->paginate(20);
        }

        return view('posts.index', [
            'posts' => $posts,
            'tags' => Tag::has('posts')->get()
        ]);
    }

    public function show(Post $post)
    {
        current_user()->setRecentView($post->id);

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
        $attributes = $request->except('tags');

        if ($request->hasFile('featured_image')) {
            $attributes['featured_image'] = request('featured_image')->store('featured-images');
        }

        if (request('published_at') != null) {
            $attributes['published_at'] = request('published_at');

            $post = current_user()->posts()->create($attributes);
        } else {
            $attributes['published_at'] = date('Y-m-d\TH:i:s');

            $post = current_user()->posts()->create($attributes);
        }

        // switch (request('action')) {
        //     case 'publish':
        //         if (request('published_at')) {
        //             $attributes['published_at'] = request('published_at');
        //         } else {
        //             $attributes['published_at'] = date('Y-m-d H:i:s');
        //         }
        //         $post = current_user()->posts()->updateOrCreate(
        //             ['title' => request('title')],
        //             [
        //                 'excerpt' => request('excerpt'), 'featured_image' => $attributes['featured_image'],
        //                 'content' => request('content'), 'published_at' => $attributes['published_at']
        //             ]
        //         );
        //         break;

        //     case 'draft':
        //         $attributes['published_at'] = NULL;
        //         $post = current_user()->posts()->updateOrCreate($attributes);
        //         break;
        // }

        $tags = json_decode(request('tags'));

        foreach ($tags as $tag) {
            $tagsId[$tag->id] = ['tag_id' => $tag->id];
        }

        $post->tags()->sync($tagsId);

        foreach (current_user()->followers as $follower) {
            $follower->notify(new PostPublished($post));
        }

        \Session::flash('status', 'Post created success');

        return response()->json(['postId' => $post->id]);
    }

    public function edit(Post $post)
    {
        $this->authorize('edit_post', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $this->authorize('edit_post', $post);

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

        \Session::flash('status', 'Update successful');

        return response()->json(['postId' => $post->id]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('destroy_post', $post);

        current_user()->posts()->where('id', $post->id)->delete($post->id);

        \Session::flash('status', 'Delete successful');

        return back();
    }
}
