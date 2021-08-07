<?php

namespace App\Http\Controllers;

use App\User;

class UserNotificationsController extends Controller
{
    public function index()
    {
        return current_user()->unreadNotifications;
    }

    public function destroy(User $user, $notificationId)
    {
        $user->notifications()->find($notificationId)->markAsRead();
    }
}
