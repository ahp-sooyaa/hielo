<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\User;
use App\Collection;
use App\Post;

class ReadingListController extends Controller
{
    public function index(User $user)
    {
        switch (request('type')) {
            case 'archieved':
                $bookmarks = Bookmark::where([
                    ['status', 'archieved'],
                    ['author_id', $user->id]
                ])->get();
                return view('readinglist.archieved', compact('user', 'bookmarks'));
                break;

            case 'recentlyViewed':
                $posts_id = session()->get('posts.recently_viewed');
                // need to check session exist or not otherwise it will throw error
                $recentPosts = Post::whereIn('id', $posts_id)->take(10)->get();

                return view('readinglist.recentlyViewed', compact('user', 'recentPosts'));
                break;

            case 'saved':
                return view('readinglist.index', compact('user'));
                break;
        }
    }

    public function store($postId)
    {
        current_user()->toggleBookmark($postId);
        return back();
    }

    public function destroy($postId)
    {
        current_user()->unbookmark($postId);

        return back();
    }

    public function archieve($postId)
    {
        current_user()->toggleArchieve($postId);

        return back();
    }

    public function collection(User $user, Collection $collection)
    {
        $bookmarks = Bookmark::where([
            ['author_id', '=', $user->id],
            ['collection', '=', $collection->name]
        ])->get();

        return view('readingList.collection', compact('bookmarks', 'user'));
    }
}
