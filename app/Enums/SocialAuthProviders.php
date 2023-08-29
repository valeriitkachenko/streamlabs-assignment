<?php

namespace App\Enums;

use App\Enums\Traits\Enumable;

enum SocialAuthProviders: string
{
    use Enumable;

    case TWITCH = 'twitch';

    public static function allowedRoutesRegex()
    {
        return implode('|', self::values());
    }
}
