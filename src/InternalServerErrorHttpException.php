<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class InternalServerErrorHttpException extends HttpException
{
    /**
     * @param array<string,string> $headers HTTP headers to send with the response
     */
    public function __construct(
        string $message = 'Internal Server Error',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(500, $message, $headers, $previous);
    }
}
