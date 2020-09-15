<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function add_admin(User $user)
    {
        return $user->isSuperAdmin();
    }

    public function edit(User $currentUser, User $user)
    {
        return $currentUser->is($user);
    }

    // admin panel delete user action
    public function delete($user)
    {
        return $user->isSuperAdmin();
    }
}
