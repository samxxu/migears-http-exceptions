<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class BadRequestHttpException extends HttpException
{
    public function __construct(
        string $message = 'Bad Request',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(400, $message, $headers, $previous);
    }
}
