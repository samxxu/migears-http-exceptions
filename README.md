# migears/http-exceptions

A minimal collection of HTTP exception classes for PHP 8.1+.

> **Background**: miGears is the open-source successor of **TinyGears**, a
> self-developed PHP framework. It was renamed and open-sourced recently because
> the name *TinyGears* is already taken in the open-source community.

## Features

- **Zero dependencies** — requires only PHP `^8.1`
- **PHP 8.1+ modern syntax** — constructor property promotion, readonly properties, strict types
- **PSR-4 autoloading** — namespace `MiGears\HttpExceptions`
- **14 common HTTP exceptions** — 4xx and 5xx status codes
- **Framework-agnostic** — carries status code and headers; the framework decides how to send them
- **Fully tested** — complete PHPUnit test suite

## Boundaries

**In scope**

- The base `HttpException` and the 14 concrete classes: status code, message, headers and
  previous-exception chaining (PSR-4 under `MiGears\HttpExceptions`).
- Carrying the status code and headers as data (`statusCode` / `headers` readonly properties,
  `getStatusCode()` / `getHeaders()`).

**Not in scope (by design)**

- Sending the response — no `Response` object, no output, no headers emitted; turning the
  exception into a response belongs to the framework or the caller.
- Routing, error rendering, logging, and choosing which status code a failure deserves.
- Any dependency beyond PHP itself (zero-dependency, no PSR interfaces).

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

The status code is carried as-is and is **not range-validated**: any integer is accepted (`0`, `999`
or a custom `418`), because the class is framework-agnostic and validating the code belongs to
whoever sends the response.

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

## 边界

**范围内**

- 共同基类 `HttpException` 与 14 个具体异常类：状态码、消息、响应头、前置异常链；PSR-4 根为 `MiGears\HttpExceptions`。
- 把状态码与响应头作为数据携带（`statusCode` / `headers` 只读属性，`getStatusCode()` / `getHeaders()`）。

**范围外（刻意不做）**

- 发送响应 —— 不提供 `Response` 对象、不做输出、不发送响应头；把异常变成响应属于框架或调用方。
- 路由、错误渲染、日志，以及「某种失败该配哪个状态码」。
- PHP 之外的任何依赖（零依赖，不引入 PSR 接口）。

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

状态码被原样携带，**不做范围校验**：任何整数都会被接受（`0`、`999` 或自定义的 `418`），因为本类与框架无关，
校验状态码属于发送响应的一方。

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
