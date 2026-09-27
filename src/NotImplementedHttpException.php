<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

final class NotImplementedHttpException extends HttpException
{
    /**
     * @param array<string,string> $headers HTTP headers to send with the response
     */
    public function __construct(
        string $message = 'Not Implemented',
        array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct(501, $message, $headers, $previous);
    }
}
