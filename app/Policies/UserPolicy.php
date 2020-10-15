<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can add new admin.
     */
    public function add_admin(User $user)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can access the route.
     */
    public function access(User $currentUser, User $user)
    {
        return $currentUser->is($user);
    }

    /**
     * Determine whether the user can edit the user profile.
     */
    public function edit(User $currentUser, User $user)
    {
        return $currentUser->is($user);
    }

    /**
     * Determine whether the user can delete the user account, post.
     */
    public function delete($user)
    {
        return $user->isSuperAdmin();
    }
}
