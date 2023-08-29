<?php

namespace App\Enums;

use App\Enums\Traits\Enumable;

enum Currencies: string
{
    use Enumable;

    case USD = 'USD';
}
