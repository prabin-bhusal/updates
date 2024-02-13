<?php

namespace App\Policies;

use App\Models\Notice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NoticePolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(): bool
    {
        return Request()->routeIs('admin.*') && Auth::guard('admin')->check();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Notice $notice): bool
    {
        return Request()->routeIs('admin.*') && Auth::guard('admin')->check();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete($user, Notice $notice): bool
    {
        return Request()->routeIs('admin.*') && Auth::guard('admin')->check();
    }
}
