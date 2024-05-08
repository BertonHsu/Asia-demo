<?php

namespace App\Http\Responses;

use ArrayObject;
use Illuminate\Http\JsonResponse;

class ErrorResponse extends JsonResponse
{
    public function __construct(
        string $message,
        array $details = [],
        int $status = 500
    ) {
        parent::__construct([
            'message' => $message,
            'details' => new ArrayObject($details),
        ], $status);
    }
}
