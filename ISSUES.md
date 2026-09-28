# migears-http-exceptions — Known Issues / 已知问题

> Summary of this module's issues. The items themselves are in [`issues/`](issues/README.md), one file
> per item: a front-matter header and a thread. This file is generated from them and can be rewritten at
> any time; edit an item, never this file.
>
> 本模块问题的概览。条目本体在 [`issues/`](issues/README.md)，一条目一文件：前置字段加讨论串。
> 本文件由条目生成，随时可以整段重写；请改条目，不要改本文件。
>
> From the miGears Full-Module Code Review Report (4th round, 2026-09-27).

| | |
|---|---|
| Status / 状态 | **Best state / 状态最好** |
| Size / 体量 | src 269 lines (206 net) · 108 tests · 15 src files |

Legend / 图例 — **P0** functional or security · **P1** documentation that fails when copied · **P2** robustness · **P3** metadata and docs
级别说明 — **P0** 功能性或安全级 · **P1** 文档照抄即错 · **P2** 健壮性 · **P3** 元数据与文档

## At a glance / 状态一览

| | |
|---|---|
| Items / 条目 | P0 0 · P1 0 · P2 0 · P3 2 · other 1 |
| Answered / 已回复 | 1 of 3 |
| Waiting / 等待回复 | `P3-1`, `P3-2` |

| id | level | status | title |
|---|---|---|---|
| [`P3-1`](issues/P3-1.md) | P3 | **open** | The 14 subclass constructors still have no docblock while the parent … |
| [`P3-2`](issues/P3-2.md) | P3 | **open** | `HttpException::VERSION` has zero references, and the base class … |
| [`G2`](issues/G2.md) | - | **fixed** | Strict flags: `phpunit.xml.dist` currently sets none of the five. The … |

## Verdict / 结论

Still the cleanest module: the README table, the data provider and the implementation agree line for line. Only two metadata items remain, one of which is arguably a deliberate choice.

仍是最干净的模块：README 表格、data provider 与实现逐条一致。只剩两条元数据项，其中一条更接近有意取舍。

## Fixed since the last round / 本轮已修复确认

CI 已补上（含 phpstan analyse）。 

## Test gaps / 测试盲区

The data provider covers the 14 fixed codes but not the base class refusing out-of-range codes, and there is no VERSION test.

data provider 覆盖 14 个既定码，但未固化基类对越界码的行为，也无 VERSION 用例。

## Verification protocol / 验证方式

- `./vendor/bin/phpunit` · `composer analyse` · `composer validate`
- Warning/notice/deprecation/risky flags in `phpunit.xml.dist`: all four on
- A PHP warning counts as a test failure only where those flags are on; otherwise run `./vendor/bin/phpunit --fail-on-warning` explicitly.
- 只有在上述开关打开时 PHP 警告才会导致套件失败；否则请显式加 `--fail-on-warning`。
