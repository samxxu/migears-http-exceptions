<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class NotImplementedHttpException extends HttpException
{
    public function __construct(
        string $message = 'Not Implemented',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(501, $message, $headers, $previous);
    }
}
