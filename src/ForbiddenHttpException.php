<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class ForbiddenHttpException extends HttpException
{
    /**
     * @param array<string,string> $headers HTTP headers to send with the response
     */
    public function __construct(
        string $message = 'Forbidden',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(403, $message, $headers, $previous);
    }
}
