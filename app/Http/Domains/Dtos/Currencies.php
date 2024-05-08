<?php

namespace App\Http\Domains\Dtos;

class Currencies
{
    public const TWD = [
        'TWD' => 1,
        'JPY' => 3.669,
        'USD' => 0.03281,
    ];

    public const JPY = [
        'TWD' => 0.26956,
        'JPY' => 1,
        'USD' => 0.00885,
    ];

    public const USD = [
        'TWD' => 30.444,
        'JPY' => 111.801,
        'USD' => 1,
    ];
}