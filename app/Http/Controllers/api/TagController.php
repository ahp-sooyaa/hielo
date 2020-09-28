<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::all());
    }
}
