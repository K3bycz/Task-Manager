<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class GetUserAvatarHelper
{
    public static function getAvatar()
    {
        $user = Auth::user();

        return $user ? $user->avatar : null;
    }
}
