<?php

namespace App\Services;

use App\Models\User;

class AuthRedirectService
{
    public function getRedirectRoute(User $user): string
    {
        return $user->isAdmin()
            ? route('admin.dashboard')
            : route('user.dashboard');
    }

    public function getRedirectPath(User $user): string
    {
        return $user->isAdmin()
            ? '/admin/dashboard'
            : '/dashboard';
    }
}
