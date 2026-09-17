<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class InternalServerErrorHttpException extends HttpException
{
    public function __construct(
        string $message = 'Internal Server Error',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(500, $message, $headers, $previous);
    }
}
