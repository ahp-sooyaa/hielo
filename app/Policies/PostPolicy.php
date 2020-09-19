<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        return $post->author_id == $user->id;
    }

    public function create(User $user)
    {
        if (!$lastPost = $user->fresh()->lastPost) {
            return true;
        }

        return !$lastPost->wasJustPublished();
    }
}
