<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class UnsupportedMediaTypeHttpException extends HttpException
{
    public function __construct(
        string $message = 'Unsupported Media Type',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(415, $message, $headers, $previous);
    }
}
