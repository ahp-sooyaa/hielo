<?php

namespace App;

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

    public function unbookmark($postId)
    {
        return $this->bookmarks()->where('post_id', $postId)->delete();
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
