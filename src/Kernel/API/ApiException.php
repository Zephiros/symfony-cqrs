<?php

namespace App\Kernel\API;

use Exception;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response;

class ApiException extends Exception implements JsonSerializable
{
    private readonly int $statusCode;
    private readonly array $errors;

    public function __construct(string $message = "", int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR, array $errors = [])
    {
        parent::__construct($message);

        $this->statusCode = $statusCode;
        $this->errors = $errors;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function jsonSerialize() : array
    {
        return [
            'status' => $this->statusCode,
            'message' => $this->getMessage(),
            'errors' => $this->errors,
        ];
    }
}