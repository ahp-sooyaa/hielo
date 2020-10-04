<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show()
    {
        // $search = request('q');

        // $posts = Post::search($search)->paginate(5);

        // if (request()->expectsJson()) {
        //     return $posts;
        // }

        return view('search');
    }
}
