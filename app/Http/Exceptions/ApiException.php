<?php

namespace App\Http\Exceptions;

use App\Http\Responses\ErrorResponse;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class ApiException extends HttpException implements Responsable
{
    protected string $errorMessage;

    protected object|array $errorDetails = [];

    public function details(object|array $details): static
    {
        $this->errorDetails = $details;
        return $this;
    }

    public function toResponse($request): ErrorResponse
    {
        return new ErrorResponse(
            $this->errorMessage,
            (array) $this->errorDetails,
            $this->getStatusCode()
        );
    }
}
