<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create_comment(User $user)
    {
        if (!$lastComment = $user->fresh()->lastComment) {
            return true;
        }

        return !$lastComment->wasJustLeft();
    }

    // public function update_comment(User $user, Comment $comment)
    // {
    //     return $this->hasAbility($user, 'update-comment') || $user->id == $comment->author_id;
    // }

    // public function destroy_comment(User $user, Comment $comment)
    // {
    //     return $this->hasAbility($user, 'destroy-comment') || $user->id == $comment->author_id;
    // }

    protected function hasAbility($user, $ability)
    {
        if ($user->abilities()->contains($ability)) {
            return true;
        }
    }
}
