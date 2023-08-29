<?php

namespace App\Enums\Traits;

trait Enumable
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
