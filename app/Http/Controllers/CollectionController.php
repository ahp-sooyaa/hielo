<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CollectionController extends Controller
{
    public function store(User $user)
    {
        request()->validate(['name' => 'required']);

        $user->addCollection(request('name'));

        return back();
    }
}
