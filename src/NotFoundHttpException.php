<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class NotFoundHttpException extends HttpException
{
    public function __construct(
        string $message = 'Not Found',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(404, $message, $headers, $previous);
    }
}
