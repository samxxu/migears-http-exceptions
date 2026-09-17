<?php

declare(strict_types=1);

namespace MiGears\HttpExceptions\Tests;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use MiGears\HttpExceptions\HttpException;
use MiGears\HttpExceptions\BadRequestHttpException;
use MiGears\HttpExceptions\UnauthorizedHttpException;
use MiGears\HttpExceptions\ForbiddenHttpException;
use MiGears\HttpExceptions\NotFoundHttpException;
use MiGears\HttpExceptions\MethodNotAllowedHttpException;
use MiGears\HttpExceptions\ConflictHttpException;
use MiGears\HttpExceptions\GoneHttpException;
use MiGears\HttpExceptions\UnsupportedMediaTypeHttpException;
use MiGears\HttpExceptions\UnprocessableEntityHttpException;
use MiGears\HttpExceptions\TooManyRequestsHttpException;
use MiGears\HttpExceptions\InternalServerErrorHttpException;
use MiGears\HttpExceptions\NotImplementedHttpException;
use MiGears\HttpExceptions\BadGatewayHttpException;
use MiGears\HttpExceptions\ServiceUnavailableHttpException;

class HttpExceptionTest extends TestCase
{
    // ── HttpException base class ────────────────────────────────────────

    public function testBaseExceptionExtendsRuntimeException(): void
    {
        $e = new HttpException(500);
        $this->assertInstanceOf(RuntimeException::class, $e);
    }

    public function testBaseExceptionStatusCode(): void
    {
        $e = new HttpException(404);
        $this->assertSame(404, $e->getStatusCode());
        $this->assertSame(404, $e->statusCode);
        $this->assertSame(404, $e->getCode());
    }

    public function testBaseExceptionDefaultMessageIsEmpty(): void
    {
        $e = new HttpException(500);
        $this->assertSame('', $e->getMessage());
    }

    public function testBaseExceptionCustomMessage(): void
    {
        $e = new HttpException(418, "I'm a teapot");
        $this->assertSame("I'm a teapot", $e->getMessage());
    }

    public function testBaseExceptionDefaultHeadersIsEmptyArray(): void
    {
        $e = new HttpException(500);
        $this->assertSame([], $e->getHeaders());
        $this->assertSame([], $e->headers);
    }

    public function testBaseExceptionCustomHeaders(): void
    {
        $headers = ['X-Custom' => 'value', 'Retry-After' => '120'];
        $e = new HttpException(429, 'Too Many Requests', $headers);
        $this->assertSame($headers, $e->getHeaders());
    }

    public function testBaseExceptionPreviousException(): void
    {
        $prev = new \Exception('previous error');
        $e = new HttpException(500, 'server error', [], $prev);
        $this->assertSame($prev, $e->getPrevious());
    }

    public function testBaseExceptionStatusCodeIsReadonly(): void
    {
        $e = new HttpException(404);
        // readonly properties cannot be reassigned – verify via reflection
        $prop = new \ReflectionProperty($e, 'statusCode');
        $this->assertTrue($prop->isReadOnly());
    }

    public function testBaseExceptionHeadersIsReadonly(): void
    {
        $e = new HttpException(404);
        $prop = new \ReflectionProperty($e, 'headers');
        $this->assertTrue($prop->isReadOnly());
    }

    // ── Sub-class default status codes & messages ──────────────────────

    /**
     * @dataProvider exceptionClassProvider
     */
    public function testEachExceptionExtendsHttpException(string $class, int $statusCode, string $defaultMessage): void
    {
        $e = new $class();
        $this->assertInstanceOf(HttpException::class, $e);
        $this->assertInstanceOf(RuntimeException::class, $e);
    }

    /**
     * @dataProvider exceptionClassProvider
     */
    public function testEachExceptionHasCorrectStatusCode(string $class, int $statusCode, string $defaultMessage): void
    {
        $e = new $class();
        $this->assertSame($statusCode, $e->getStatusCode());
        $this->assertSame($statusCode, $e->statusCode);
        $this->assertSame($statusCode, $e->getCode());
    }

    /**
     * @dataProvider exceptionClassProvider
     */
    public function testEachExceptionHasCorrectDefaultMessage(string $class, int $statusCode, string $defaultMessage): void
    {
        $e = new $class();
        $this->assertSame($defaultMessage, $e->getMessage());
    }

    /**
     * @dataProvider exceptionClassProvider
     */
    public function testEachExceptionSupportsCustomMessage(string $class): void
    {
        $e = new $class('custom message');
        $this->assertSame('custom message', $e->getMessage());
    }

    /**
     * @dataProvider exceptionClassProvider
     */
    public function testEachExceptionSupportsCustomHeaders(string $class): void
    {
        $headers = ['X-Test' => 'yes', 'Content-Type' => 'application/json'];
        $e = new $class('oops', $headers);
        $this->assertSame($headers, $e->getHeaders());
    }

    /**
     * @dataProvider exceptionClassProvider
     */
    public function testEachExceptionSupportsPreviousException(string $class): void
    {
        $prev = new \InvalidArgumentException('bad input');
        $e = new $class('oops', [], $prev);
        $this->assertSame($prev, $e->getPrevious());
    }

    /**
     * @dataProvider exceptionClassProvider
     */
    public function testEachExceptionCanBeThrown(string $class): void
    {
        $this->expectException($class);
        throw new $class();
    }

    public function testAllExpectedExceptionClassesExist(): void
    {
        $expected = [
            'BadRequestHttpException',
            'UnauthorizedHttpException',
            'ForbiddenHttpException',
            'NotFoundHttpException',
            'MethodNotAllowedHttpException',
            'ConflictHttpException',
            'GoneHttpException',
            'UnsupportedMediaTypeHttpException',
            'UnprocessableEntityHttpException',
            'TooManyRequestsHttpException',
            'InternalServerErrorHttpException',
            'NotImplementedHttpException',
            'BadGatewayHttpException',
            'ServiceUnavailableHttpException',
        ];

        foreach ($expected as $className) {
            $fqcn = 'MiGears\\HttpExceptions\\' . $className;
            $this->assertTrue(class_exists($fqcn), "Class $fqcn should exist");
        }
    }

    // ── Data provider ──────────────────────────────────────────────────

    public static function exceptionClassProvider(): array
    {
        return [
            'BadRequest (400)'           => [BadRequestHttpException::class,           400, 'Bad Request'],
            'Unauthorized (401)'         => [UnauthorizedHttpException::class,         401, 'Unauthorized'],
            'Forbidden (403)'            => [ForbiddenHttpException::class,            403, 'Forbidden'],
            'NotFound (404)'             => [NotFoundHttpException::class,             404, 'Not Found'],
            'MethodNotAllowed (405)'     => [MethodNotAllowedHttpException::class,     405, 'Method Not Allowed'],
            'Conflict (409)'             => [ConflictHttpException::class,             409, 'Conflict'],
            'Gone (410)'                 => [GoneHttpException::class,                 410, 'Gone'],
            'UnsupportedMediaType (415)' => [UnsupportedMediaTypeHttpException::class, 415, 'Unsupported Media Type'],
            'UnprocessableEntity (422)'  => [UnprocessableEntityHttpException::class,  422, 'Unprocessable Entity'],
            'TooManyRequests (429)'      => [TooManyRequestsHttpException::class,      429, 'Too Many Requests'],
            'InternalServerError (500)'  => [InternalServerErrorHttpException::class,  500, 'Internal Server Error'],
            'NotImplemented (501)'       => [NotImplementedHttpException::class,       501, 'Not Implemented'],
            'BadGateway (502)'           => [BadGatewayHttpException::class,           502, 'Bad Gateway'],
            'ServiceUnavailable (503)'   => [ServiceUnavailableHttpException::class,   503, 'Service Unavailable'],
        ];
    }
}
