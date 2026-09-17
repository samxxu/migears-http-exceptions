<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class ConflictHttpException extends HttpException
{
    public function __construct(
        string $message = 'Conflict',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(409, $message, $headers, $previous);
    }
}
