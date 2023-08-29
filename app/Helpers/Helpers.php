<?php

namespace App\Helpers;

use App\Enums\Currencies;

class Helpers
{
    public static function formatAmount(float $amount, $currency = Currencies::USD)
    {
        return number_format($amount, 2, '.', ' ') . ' ' . $currency->value;
    }
}
