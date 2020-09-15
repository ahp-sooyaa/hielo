<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $guarded = [];

    protected $with = ['author', 'post'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function archieved()
    {
        return $this->where('status', 'archieved');
    }
}
