<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use Searchable;
    protected $guarded = [];
    protected $withCount = ['posts'];

    public function scopeWithPublishedPosts($query)
    {
        return $query->whereName(request('tag'))
                ->firstOrFail()
                ->posts
                ->whereNotNull('published_at');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function path()
    {
        return "/posts?tag={$this->name}";
    }

    public function toSearchableArray()
    {
        return $this->toArray() + ['path' => $this->path()];
    }
}
