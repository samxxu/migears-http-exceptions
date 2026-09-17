# migears/http-exceptions

A minimal collection of HTTP exception classes for PHP 8.1+.

## Features

- **Zero dependencies** — requires only PHP `^8.1`
- **PHP 8.1+ modern syntax** — constructor property promotion, readonly properties, strict types
- **PSR-4 autoloading** — namespace `MiGears\HttpExceptions`
- **14 common HTTP exceptions** — 4xx and 5xx status codes
- **Framework-agnostic** — carries status code and headers; the framework decides how to send them
- **Fully tested** — complete PHPUnit test suite

## Installation

```bash
composer require migears/http-exceptions
```

## Usage

### Basic usage

```php
use MiGears\HttpExceptions\NotFoundHttpException;

throw new NotFoundHttpException();
// status code: 404, message: "Not Found"
```

### Custom message

```php
use MiGears\HttpExceptions\ForbiddenHttpException;

throw new ForbiddenHttpException('You shall not pass');
```

### Custom headers

```php
use MiGears\HttpExceptions\TooManyRequestsHttpException;

throw new TooManyRequestsHttpException(
    message: 'Rate limit exceeded',
    headers: ['Retry-After' => '60'],
);
```

### Previous exception chaining

```php
use MiGears\HttpExceptions\InternalServerErrorHttpException;

try {
    // ...
} catch (\Throwable $e) {
    throw new InternalServerErrorHttpException(previous: $e);
}
```

### Base class

All exceptions extend `HttpException`, which extends `\RuntimeException`:

```php
use MiGears\HttpExceptions\HttpException;

$e = new HttpException(statusCode: 418, message: "I'm a teapot");

$e->getStatusCode();  // 418
$e->statusCode;       // 418 (readonly public property)
$e->getHeaders();     // []
$e->headers;          // [] (readonly public property)
$e->getMessage();     // "I'm a teapot"
```

## Available exceptions

| Class                              | Code | Default Message          |
|------------------------------------|------|--------------------------|
| `BadRequestHttpException`          | 400  | Bad Request              |
| `UnauthorizedHttpException`        | 401  | Unauthorized             |
| `ForbiddenHttpException`           | 403  | Forbidden                |
| `NotFoundHttpException`            | 404  | Not Found                |
| `MethodNotAllowedHttpException`    | 405  | Method Not Allowed       |
| `ConflictHttpException`            | 409  | Conflict                 |
| `GoneHttpException`                | 410  | Gone                     |
| `UnsupportedMediaTypeHttpException`| 415  | Unsupported Media Type   |
| `UnprocessableEntityHttpException` | 422  | Unprocessable Entity     |
| `TooManyRequestsHttpException`     | 429  | Too Many Requests        |
| `InternalServerErrorHttpException` | 500  | Internal Server Error    |
| `NotImplementedHttpException`      | 501  | Not Implemented          |
| `BadGatewayHttpException`          | 502  | Bad Gateway              |
| `ServiceUnavailableHttpException`  | 503  | Service Unavailable      |

## Testing

```bash
composer install
vendor/bin/phpunit
```

## License

MIT

---

# migears/http-exceptions

一个适用于 PHP 8.1+ 的极简 HTTP 异常类集合。

## 特性

- **零依赖** — 仅要求 PHP `^8.1`
- **PHP 8.1+ 现代语法** — 构造器属性提升、readonly 属性、严格类型
- **PSR-4 自动加载** — 命名空间 `MiGears\HttpExceptions`
- **14 个常用 HTTP 异常** — 覆盖 4xx 和 5xx 状态码
- **框架无关** — 携带状态码和响应头，由框架决定如何发送
- **完整测试** — 完整的 PHPUnit 测试套件

## 安装

```bash
composer require migears/http-exceptions
```

## 使用

### 基本用法

```php
use MiGears\HttpExceptions\NotFoundHttpException;

throw new NotFoundHttpException();
// status code: 404, message: "Not Found"
```

### 自定义消息

```php
use MiGears\HttpExceptions\ForbiddenHttpException;

throw new ForbiddenHttpException('You shall not pass');
```

### 自定义响应头

```php
use MiGears\HttpExceptions\TooManyRequestsHttpException;

throw new TooManyRequestsHttpException(
    message: 'Rate limit exceeded',
    headers: ['Retry-After' => '60'],
);
```

### 前置异常链式传递

```php
use MiGears\HttpExceptions\InternalServerErrorHttpException;

try {
    // ...
} catch (\Throwable $e) {
    throw new InternalServerErrorHttpException(previous: $e);
}
```

### 基类

所有异常都继承自 `HttpException`，后者继承自 `\RuntimeException`：

```php
use MiGears\HttpExceptions\HttpException;

$e = new HttpException(statusCode: 418, message: "I'm a teapot");

$e->getStatusCode();  // 418
$e->statusCode;       // 418（readonly 公共属性）
$e->getHeaders();     // []
$e->headers;          // []（readonly 公共属性）
$e->getMessage();     // "I'm a teapot"
```

## 可用异常列表

| 类名                               | 状态码 | 默认消息                  |
|------------------------------------|--------|---------------------------|
| `BadRequestHttpException`          | 400    | Bad Request               |
| `UnauthorizedHttpException`        | 401    | Unauthorized              |
| `ForbiddenHttpException`           | 403    | Forbidden                 |
| `NotFoundHttpException`            | 404    | Not Found                 |
| `MethodNotAllowedHttpException`    | 405    | Method Not Allowed        |
| `ConflictHttpException`            | 409    | Conflict                  |
| `GoneHttpException`                | 410    | Gone                      |
| `UnsupportedMediaTypeHttpException`| 415    | Unsupported Media Type    |
| `UnprocessableEntityHttpException` | 422    | Unprocessable Entity      |
| `TooManyRequestsHttpException`     | 429    | Too Many Requests         |
| `InternalServerErrorHttpException` | 500    | Internal Server Error     |
| `NotImplementedHttpException`      | 501    | Not Implemented           |
| `BadGatewayHttpException`          | 502    | Bad Gateway               |
| `ServiceUnavailableHttpException`  | 503    | Service Unavailable       |

## 测试

```bash
composer install
vendor/bin/phpunit
```

## 许可证

MIT
