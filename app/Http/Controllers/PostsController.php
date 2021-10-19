<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePostForm;
use App\Http\Requests\UpdatePostForm;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create');
    }

    public function index()
    {
        if (request('tag')) {
            $posts = Tag::withPublishedPosts();
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
        auth_user() ? auth_user()->setRecentView($post->id) : null;

        return view('posts.show', [
            'post' => $post,
            'relatedPosts' => $post->relatedPosts()
        ]);
    }

    public function create()
    {
        return view('posts.create', ['tags' => Tag::all()]);
    }

    public function store(StorePostForm $form)
    {
        $post = $form->persist();

        Session::flash('status', 'Post created success');

        return response()->json(['postId' => $post->id]);
    }

    public function edit(Post $post)
    {
        $this->authorize('edit_post', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostForm $form, Post $post)
    {
        $form->persist($post);

        Session::flash('status', 'Update successful changed');

        return response()->json(['postId' => $post->id]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('destroy_post', $post);

        $post->delete();

        return back()->with('status', 'Successfully deleted your post');
    }
}
