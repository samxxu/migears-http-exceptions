<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class ForbiddenHttpException extends HttpException
{
    public function __construct(
        string $message = 'Forbidden',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(403, $message, $headers, $previous);
    }
}
