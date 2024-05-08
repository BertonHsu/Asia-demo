<?php

namespace App\Http\Responses\Currency\Exchange;

use App\Http\Responses\SuccessResponse;

class IndexResponse extends SuccessResponse
{
    public const SUCCESS_MSG = 'success';

    public function __construct(
        float $amount
    ) {
        parent::__construct([
            'msg' => self::SUCCESS_MSG,
            'amount' => number_format($amount, 2)
        ]);
    }
}
