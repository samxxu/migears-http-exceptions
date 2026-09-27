<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class ServiceUnavailableHttpException extends HttpException
{
    /**
     * @param array<string,string> $headers HTTP headers to send with the response
     */
    public function __construct(
        string $message = 'Service Unavailable',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(503, $message, $headers, $previous);
    }
}
