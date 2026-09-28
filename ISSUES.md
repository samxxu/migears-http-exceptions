# migears-http-exceptions — Known Issues

> Summary of this module's issues. The items themselves are in [`issues/`](issues/README.md), one file
> per item: a front-matter header and a thread. This file is generated from them and can be rewritten at
> any time; edit an item, never this file.
>
> From the miGears Full-Module Code Review Report (5th round, 2026-09-28).

| | |
|---|---|
| Status | **Best state** |
| Size | src 206 lines (net) · 109 tests · 15 src files |

Legend — **P0** functional or security · **P1** documentation that fails when copied · **P2** robustness · **P3** metadata and docs

## At a glance

| | |
|---|---|
| Unsettled | P0 0 · P1 0 · P2 0 · P3 2 · other 1 |
| Settled | 0 of 3 |
| Waiting on the owner | `P3-1`, `P3-2` |
| Waiting on the reviewer | `G2` |
| Waiting on the coordinator | _nothing_ |
| Deferred, owing nobody | _nothing_ |

| id | level | status | title |
|---|---|---|---|
| [`P3-1`](issues/P3-1.md) | P3 | **open** | The 14 subclass constructors still have no docblock while the parent … |
| [`P3-2`](issues/P3-2.md) | P3 | **open** | `HttpException::VERSION` has zero references, and the base class … |
| [`G2`](issues/G2.md) | - | **fixed** | Strict flags: `phpunit.xml.dist` currently sets none of the five. The … |

## Unclosed

What is left to do here: every item whose `status` is not `verified` or `closed`,
highest severity first. `waiting on` is the party who acts next, read from that status.

| | |
|---|---|
| Unclosed | **3** of 3 |
| By status | `open` 2 · `fixed` 1 |
| Waiting on | owner 2 · reviewer 1 |

| level | item | status | waiting on | title |
|---|---|---|---|---|
| **P3** | [`P3-1`](issues/P3-1.md) | `open` | owner | The 14 subclass constructors still have no docblock while the parent … |
| **P3** | [`P3-2`](issues/P3-2.md) | `open` | owner | `HttpException::VERSION` has zero references, and the base class … |
| **-** | [`G2`](issues/G2.md) | `fixed` | reviewer | Strict flags: `phpunit.xml.dist` currently sets none of the five. The … |

## Verdict

A minimal, clean collection of 14 HTTP exception classes with consistent design and zero runtime dependencies. All defects are P3-level metadata and docstring polish.

## Fixed since the last round

G2 strict flags confirmed complete; P3-1 subclass docblocks now document $headers param.

## Test gaps

No test for status code validation (or explicit absence thereof); no test for subclass final keyword enforcement; no test verifying all subclasses are listed in the README table.

## Verification protocol

- `./vendor/bin/phpunit` · `composer analyse` · `composer validate`
- Warning/notice/deprecation/risky flags in `phpunit.xml.dist`: all four on
- A PHP warning counts as a test failure only where those flags are on; otherwise run `./vendor/bin/phpunit --fail-on-warning` explicitly.


---

# migears-http-exceptions — 已知问题

> 本模块问题的概览。条目本体在 [`issues/`](issues/README.md)，一条目一文件：前置字段加讨论串。
> 本文件由条目生成，随时可以整段重写；请改条目，不要改本文件。
>
> 出自 miGears 全模块代码评审报告（5th round，2026-09-28）。

| | |
|---|---|
| 状态 | **状态最好** |
| 体量 | src 206 行（净）· 109 个用例 · 15 个源文件 |

级别说明 — **P0** 功能性或安全级 · **P1** 文档照抄即错 · **P2** 健壮性 · **P3** 元数据与文档

## 状态一览

| | |
|---|---|
| 未了结 | P0 0 · P1 0 · P2 0 · P3 2 · 其他 1 |
| 已了结 | 0 / 3 |
| 等负责人 | `P3-1`, `P3-2` |
| 等评审方 | `G2` |
| 等协调人 | _无_ |
| 已暂缓，不欠谁 | _无_ |

| id | 级别 | 状态 | 标题 |
|---|---|---|---|
| [`P3-1`](issues/P3-1.md) | P3 | **open** | 14 个子类构造器仍无 docblock，而父类记录了 @param array<string,string> … |
| [`P3-2`](issues/P3-2.md) | P3 | **open** | HttpException::VERSION 零引用；基类接受任意状态码（含 0 与 999）。README 主动示范自定义 … |
| [`G2`](issues/G2.md) | - | **fixed** | 严格开关：`phpunit.xml.dist` … |

## 未关闭

本模块还剩什么要做：所有 `status` 不是 `verified` 或 `closed` 的条目，按严重度从高到低。
`waiting on` 是下一步该动手的一方，由其状态读出。

| | |
|---|---|
| 未关闭 | **3** / 3 |
| 按状态 | `open` 2 · `fixed` 1 |
| 等在谁 | 负责人 2 · 评审方 1 |

| 级别 | 条目 | 状态 | 等在谁 | 标题 |
|---|---|---|---|---|
| **P3** | [`P3-1`](issues/P3-1.md) | `open` | 负责人 | 14 个子类构造器仍无 docblock，而父类记录了 @param array<string,string> … |
| **P3** | [`P3-2`](issues/P3-2.md) | `open` | 负责人 | HttpException::VERSION 零引用；基类接受任意状态码（含 0 与 999）。README 主动示范自定义 … |
| **-** | [`G2`](issues/G2.md) | `fixed` | 评审方 | 严格开关：`phpunit.xml.dist` … |

## 结论

一个极简、干净的 14 个 HTTP 异常类集合，设计一致，零运行时依赖。所有缺陷均为 P3 级元数据与文档注释润色。

## 本轮已修复确认

G2 strict flags confirmed complete; P3-1 subclass docblocks now document $headers param.

## 测试盲区

无状态码校验（或明确无校验）测试；无子类 final 关键字强制测试；无验证 README 表格列出所有子类的测试。

## 验证方式

- `./vendor/bin/phpunit` · `composer analyse` · `composer validate`
- `phpunit.xml.dist` 中的 warning/notice/deprecation/risky 开关：四个全开
- 只有在上述开关打开时 PHP 警告才会导致套件失败；否则请显式加 `--fail-on-warning`。
