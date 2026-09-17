<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class UnprocessableEntityHttpException extends HttpException
{
    public function __construct(
        string $message = 'Unprocessable Entity',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(422, $message, $headers, $previous);
    }
}
