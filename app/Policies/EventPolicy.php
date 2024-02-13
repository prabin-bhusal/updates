<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class EventPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function createByUser($user): bool
    {
        return Auth::guard('web')->check();
    }

    public function createByAdmin($user): bool
    {
        return Request()->routeIs('admin.*') && Auth::guard('admin')->check();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function updateByUser($user, Event $event): bool
    {
        return $event->user_id == $user->id;
    }

    public function updateByAdmin($user, Event $event): bool
    {
        return $event->admin_id != null && Auth::guard('admin')->check();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function deleteByUser($user, Event $event): bool
    {
        return $event->user_id == $user->id;
    }

    public function deleteByAdmin($user, Event $event): bool
    {
        return $event->admin_id != null && Auth::guard('admin')->check();
    }
}
