<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class GoneHttpException extends HttpException
{
    public function __construct(
        string $message = 'Gone',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(410, $message, $headers, $previous);
    }
}
