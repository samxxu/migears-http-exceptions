<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class BadGatewayHttpException extends HttpException
{
    public function __construct(
        string $message = 'Bad Gateway',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(502, $message, $headers, $previous);
    }
}
