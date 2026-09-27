<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class MethodNotAllowedHttpException extends HttpException
{
    /**
     * @param array<string,string> $headers HTTP headers to send with the response
     */
    public function __construct(
        string $message = 'Method Not Allowed',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(405, $message, $headers, $previous);
    }
}
