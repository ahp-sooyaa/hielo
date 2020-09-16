<?php

namespace App;

use App\Traits\RecordActivity;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use RecordActivity;

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
}
