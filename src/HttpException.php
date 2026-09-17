<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions;

use RuntimeException;

class HttpException extends RuntimeException
{
    public const VERSION = '2.0.0';

    /**
     * @param int                  $statusCode HTTP status code
     * @param string               $message    Exception message
     * @param array<string,string> $headers    HTTP headers to send with the response
     * @param \Throwable|null      $previous   Previous exception for chaining
     */
    public function __construct(
        public readonly int $statusCode,
        string $message = '',
        public readonly array $headers = [],
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, $statusCode, $previous);
    }

    /**
     * Get the HTTP status code.
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Get the HTTP response headers.
     *
     * @return array<string,string>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
