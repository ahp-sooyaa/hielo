<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function edit_post(User $user, Post $post)
    {
        return $this->hasAbility($user, 'edit-post') || $post->author_id == $user->id;
    }

    /**
     * Throttle of creating post 
     * within one minute user can't create another post
     */
    public function create_post(User $user)
    {
        if (!$lastPost = $user->fresh()->lastPost) {
            return true;
        }

        return !$lastPost->wasJustPublished();
    }

    public function destroy_post(User $user, Post $post)
    {
        return $this->hasAbility($user, 'destroy-post') || $post->author_id == $user->id;
    }

    protected function hasAbility($user, $ability)
    {
        if ($user->abilities()->contains($ability)) {
            return true;
        }
    }
}
