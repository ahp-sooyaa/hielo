<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(User $user, User $currentUser)
    {
        if ($currentUser->is($user)) {
            return true;
        }
    }

    /**
     * To create new user records in admin panel: 
     * A user must have ability 'create-users'.
     * SuperAdmin is already pass of all authorization.
     */
    public function create_user(User $currentUser)
    {
        return $this->hasAbility($currentUser, 'create-user');
    }

    /**
     * To update user profile: 
     * A user must have ability 'edit' or must be user own profile.
     * SuperAdmin is already pass of all authorization.
     */
    public function edit_user(User $currentUser, User $user)
    {
        return $this->hasAbility($currentUser, 'edit-user') || $currentUser->id == $user->id;
    }

    /**
     * To delete user account or record: 
     * A user must have ability 'delete' or must be user own account.
     * SuperAdmin is already pass of all authorization.
     */
    public function destroy_user(User $user)
    {
        return $this->hasAbility($user, 'destroy-user');
    }

    protected function hasAbility($user, $ability)
    {
        if ($user->abilities()->contains($ability)) {
            return true;
        }
    }
}
