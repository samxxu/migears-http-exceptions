<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class ConflictHttpException extends HttpException
{
    /**
     * @param array<string,string> $headers HTTP headers to send with the response
     */
    public function __construct(
        string $message = 'Conflict',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(409, $message, $headers, $previous);
    }
}
