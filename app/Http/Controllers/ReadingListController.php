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
        $this->authorize('access_route', $user);

        switch (request('type')) {
            case 'archieved':
                $bookmarks = Bookmark::where([
                    ['status', 'archieved'],
                    ['author_id', $user->id]
                ])->get();
                return view('readinglist.archieved', compact('user', 'bookmarks'));
                break;

            case 'recentlyViewed':
                $posts_id = current_user()->getRecentView();
                // dd($posts_id);
                if ($posts_id != NULL) {
                    $recentPosts = Post::whereIn('id', $posts_id)->take(10)->get();
                } else {
                    $recentPosts = 'No recently viewed Posts';
                }

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
}
