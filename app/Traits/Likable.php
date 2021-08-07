<?php

namespace App\Traits;

use App\Like;

/**
 * 
 */
trait Likable
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLiked()
    {
        return $this->likes()
            ->where('author_id', auth()->id())
            ->exists();
    }

    public function like()
    {
        $this->likes()->create([
            'author_id' => auth()->id()
        ]);
    }

    public function dislike()
    {
        $this->likes()
            ->where('author_id', auth()->id())
            ->delete();
    }
}
