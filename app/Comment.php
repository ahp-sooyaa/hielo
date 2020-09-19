<?php

namespace App;

use App\Traits\RecordActivity;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function wasJustLeft()
    {
        return $this->created_at->gt(Carbon::now()->subMinute());
    }
}
