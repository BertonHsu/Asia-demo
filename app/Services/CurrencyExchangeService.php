<?php

namespace App\Services;

use App\Http\Domains\Dtos\Currencies;
use App\Http\Domains\Enums\Currency;

class CurrencyExchangeService
{
    public function __construct(
        private Currencies $currencies
    ) {
    }

    public function exchange(
        Currency $source, 
        Currency $target, 
        int $amount
    ): float {
        return round($amount * (match ($source) {
            Currency::TWD => Currencies::TWD[$target->value],
            Currency::JPY => Currencies::JPY[$target->value],
            Currency::USD => Currencies::USD[$target->value],
            default => 0
        }), 2);
    }
}