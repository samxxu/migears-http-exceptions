# migears-http-exceptions — Known Issues

> Summary of this module's issues. The items themselves are in [`issues/`](issues/README.md), one file
> per item: a front-matter header and a thread. This file is generated from them and can be rewritten at
> any time; edit an item, never this file.
>
> From the miGears Full-Module Code Review Report (6th round, 2026-10-01).

| | |
|---|---|
| Status | **Best state** |
| Size | src 206 lines (net) · 124 tests · 15 src files |

Legend — **P0** functional or security · **P1** documentation that fails when copied · **P2** robustness · **P3** metadata and docs

## At a glance

| | |
|---|---|
| Unsettled | P0 0 · P1 0 · P2 0 · P3 0 · other 0 |
| Settled | 3 of 3 |
| Waiting on the owner | _nothing_ |
| Waiting on the coordinator | _nothing_ |
| Waiting on the reviewer | _nothing_ |
| Deferred, owing nobody | _nothing_ |

| id | level | status | title |
|---|---|---|---|
| [`P3-1`](issues/P3-1.md) | P3 | **verified** | The 14 subclass constructors still have no docblock while the parent … |
| [`P3-2`](issues/P3-2.md) | P3 | **verified** | `HttpException::VERSION` has zero references, and the base class … |
| [`G2`](issues/G2.md) | - | **verified** | Strict flags: `phpunit.xml.dist` currently sets none of the five. The … |

## Unclosed

_Nothing unclosed — every item in this module is `verified` or `closed`._

## Verdict

The permissive range is now a documented contract rather than an unstated one, and the class family is otherwise identical in shape.

## Fixed since the last round

P3-2 verified by mutation: the base constructor now documents that the status code is not range-validated (the recorded option B). All fourteen status codes also match the README table one for one.

## Test gaps

No real gap: the constructor contract, default messages, header/previous chaining and the README table are all data-provider covered.

## Verification protocol

- `./vendor/bin/phpunit` · `composer analyse` · `composer validate`
- Warning/notice/deprecation/risky flags in `phpunit.xml.dist`: all four on
- A PHP warning counts as a test failure only where those flags are on; otherwise run `./vendor/bin/phpunit --fail-on-warning` explicitly.


---

# migears-http-exceptions — 已知问题

> 本模块问题的概览。条目本体在 [`issues/`](issues/README.md)，一条目一文件：前置字段加讨论串。
> 本文件由条目生成，随时可以整段重写；请改条目，不要改本文件。
>
> 出自 miGears 全模块代码评审报告（6th round，2026-10-01）。

| | |
|---|---|
| 状态 | **状态最好** |
| 体量 | src 206 行（净）· 124 个用例 · 15 个源文件 |

级别说明 — **P0** 功能性或安全级 · **P1** 文档照抄即错 · **P2** 健壮性 · **P3** 元数据与文档

## 状态一览

| | |
|---|---|
| 未了结 | P0 0 · P1 0 · P2 0 · P3 0 · 其他 0 |
| 已了结 | 3 / 3 |
| 等模块主 | _无_ |
| 等协调人 | _无_ |
| 等评审方 | _无_ |
| 已暂缓，不欠谁 | _无_ |

| id | 级别 | 状态 | 标题 |
|---|---|---|---|
| [`P3-1`](issues/P3-1.md) | P3 | **verified** | 14 个子类构造器仍无 docblock，而父类记录了 @param array<string,string> … |
| [`P3-2`](issues/P3-2.md) | P3 | **verified** | HttpException::VERSION 零引用；基类接受任意状态码（含 0 与 999）。README 主动示范自定义 … |
| [`G2`](issues/G2.md) | - | **verified** | 严格开关：`phpunit.xml.dist` … |

## 未关闭

_无未关闭条目——本模块每条都已是 `verified` 或 `closed`。_

## 结论

宽松区间现已是写在文档里的契约，而非默认行为；该类族的其余形状完全一致。

## 本轮已修复确认

P3-2 verified by mutation: the base constructor now documents that the status code is not range-validated (the recorded option B). All fourteen status codes also match the README table one for one.

## 测试盲区

无实质盲区：构造契约、默认消息、headers/previous 链与 README 表均由数据提供者覆盖。

## 验证方式

- `./vendor/bin/phpunit` · `composer analyse` · `composer validate`
- `phpunit.xml.dist` 中的 warning/notice/deprecation/risky 开关：四个全开
- 只有在上述开关打开时 PHP 警告才会导致套件失败；否则请显式加 `--fail-on-warning`。
