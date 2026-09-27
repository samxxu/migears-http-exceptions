<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class UnauthorizedHttpException extends HttpException
{
    /**
     * @param array<string,string> $headers HTTP headers to send with the response
     */
    public function __construct(
        string $message = 'Unauthorized',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(401, $message, $headers, $previous);
    }
}
