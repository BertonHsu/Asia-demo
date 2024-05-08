<?php

namespace App\Http\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class ValidationFailedException extends ApiException
{
    private const VALIDATION_FAILED = '帶入內容驗證失敗';

    public function __construct()
    {
        $this->errorMessage = self::VALIDATION_FAILED;
        parent::__construct(
            Response::HTTP_BAD_REQUEST,
            self::VALIDATION_FAILED
        );
    }
}
