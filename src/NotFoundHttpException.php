<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class NotFoundHttpException extends HttpException
{
    /**
     * @param array<string,string> $headers HTTP headers to send with the response
     */
    public function __construct(
        string $message = 'Not Found',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(404, $message, $headers, $previous);
    }
}
