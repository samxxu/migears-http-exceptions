<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class TooManyRequestsHttpException extends HttpException
{
    /**
     * @param array<string,string> $headers HTTP headers to send with the response
     */
    public function __construct(
        string $message = 'Too Many Requests',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(429, $message, $headers, $previous);
    }
}
