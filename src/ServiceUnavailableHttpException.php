<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class ServiceUnavailableHttpException extends HttpException
{
    public function __construct(
        string $message = 'Service Unavailable',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(503, $message, $headers, $previous);
    }
}
