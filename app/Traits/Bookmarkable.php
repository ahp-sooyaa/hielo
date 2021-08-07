<?php

namespace App\Traits;

use App\Bookmark;

/**
 * 
 */
trait Bookmarkable
{
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'author_id');
    }

    public function unArchievedBookmarks()
    {
        return $this->hasMany(Bookmark::class, 'author_id')->whereNull('status');
    }

    public function toggleBookmark($postId)
    {
        if ($this->isBookmark($postId)) {
            return $this->unbookmark($postId);
        }
        $this->bookmark($postId);
    }

    public function isBookmark($postId)
    {
        return $this->bookmarks()
            ->where([
                ['post_id', $postId],
                ['author_id', auth()->id()]
            ])
            ->exists();
    }

    public function bookmark($postId)
    {
        $this->bookmarks()->create([
            'post_id' => $postId,
            'author_id' => auth()->id()
        ]);
    }

    public function unbookmark($postId)
    {
        $this->bookmarks()->where('post_id', $postId)->delete();
    }

    public function toggleArchieve($postId)
    {
        if ($this->isArchieve($postId)) {
            return $this->unArchieve($postId);
        }
        $this->archieve($postId);
    }

    public function isArchieve($postId)
    {
        return $this->bookmarks()
            ->where([
                ['post_id', $postId],
                ['status', 'archieved']
            ])
            ->exists();
    }

    public function archieve($postId)
    {
        return $this->bookmarks()->where('post_id', $postId)->update(['status' => 'archieved']);
    }
    public function unArchieve($postId)
    {
        return $this->bookmarks()->where('post_id', $postId)->delete();
    }
}
