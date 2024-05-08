<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class SuccessResponse extends JsonResponse
{
    public function __construct(
        mixed $data = null,
        array $headers = []
    ) {
        parent::__construct($data, 200, $headers);
    }
}
