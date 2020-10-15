<?php

namespace App\Traits;

use App\User;

/**
 * 
 */
trait Followable
{
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }

    public function toggleFollows(User $user)
    {
        if ($this->isFollowing($user)) {
            return $this->unfollow($user);
        }
        $this->follow($user);
    }

    public function isFollower(User $user)
    {
        return $this->followers()
            ->where('user_id', $user->id)
            ->exists();
    }

    public function isFollowing(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }
}
