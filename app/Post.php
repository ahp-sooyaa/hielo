<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Likable, RecordActivity, Reportable;

    protected $guarded = [];
    protected $dates = ['published_at', 'created_at', 'updated_at'];
    protected $withCount = ['comments', 'likes'];

    public function path()
    {
        return "/posts/{$this->id}";
    }

    public function getFeaturedImageAttribute($value)
    {
        return asset($value);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addComment($body)
    {
        return $this->comments()->create([
            'author_id' => auth()->id(),
            'body' => $body
        ]);
    }

    public function isEdited()
    {
        return $this->created_at < $this->updated_at;
    }
}
