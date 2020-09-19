<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if (!$lastComment = $user->fresh()->lastComment) {
            return true;
        }

        return !$lastComment->wasJustLeft();
    }
}
