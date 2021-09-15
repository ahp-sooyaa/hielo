<?php

namespace App;

use App\Traits\Shareable;
use App\Traits\Likable;
use App\Traits\RecordActivity;
use App\Traits\Reportable;
use Carbon\Carbon;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Likable, RecordActivity, Reportable, Shareable, Searchable;

    protected $guarded = [];
    protected $dates = ['published_at'];
    protected $withCount = ['comments', 'likes'];
    protected $with = ['author', 'tags'];

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

    public function addComment($comment)
    {
        $comment = $this->comments()->create($comment);

        return $comment;
    }

    public function isEdited()
    {
        return $this->created_at < $this->updated_at;
    }

    public function relatedPosts()
    {
        return $this->whereHas('tags', function (Builder $query) {
            return $query->whereIn('name', $this->tags->pluck('name'));
        })->where([
            ['id', '!=', $this->id],
            ['published_at', '!=', null]
        ])->latest()->take(3)->get();
    }

    protected $shareOptions = [
        'columns' => [
            'title' => 'title'
        ],
        'url' => null
    ];

    public function wasJustPublished()
    {
        return $this->created_at->gt(Carbon::now()->subMinute());
    }

    public function getUrlAttribute()
    {
        return route('posts.show', $this->title);
    }

    public function toSearchableArray()
    {
        return $this->toArray() + [
            'path' => $this->path(),
            'author' => $this->author
        ];
    }
}
