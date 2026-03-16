# Webアプリケーション脆弱性診断講座 デモサイト

このリポジトリは、**「Webアプリケーション脆弱性診断講座」向けの総合デモ環境**です。  
`demo/` 配下の脆弱性ミニアプリだけでなく、`auction/`・`xss_attacker/`・`digest/`・`private/`・`wstest/` など、講座で使う補助シナリオも含んでいます。

> [!WARNING]
> 本リポジトリには教育目的で脆弱性が意図的に実装されています。  
> **インターネットへ公開しないこと**、**本番データを使わないこと**、**隔離環境でのみ実行すること**を厳守してください。

---

## 1. リポジトリ全体の構成

| パス | 用途 |
|---|---|
| `demo/` | 脆弱性ごとのメインデモ（SQLi, XSS, CSRF など） |
| `auction/` | オークションサイト風のCGIデモ（ログイン/一覧/セッション） |
| `xss_attacker/` | XSS攻撃者側ページ・資格情報取得シナリオ |
| `wstest/` | WebSocketテストページとCSWSH関連デモ |
| `digest/` | Digest認証向けの静的コンテンツ |
| `private/` | Basic認証向けの静的コンテンツ |
| `mysql.dump` | `vuln` DB用の初期データ |
| `passfile`, `passfile.digest` | Basic / Digest認証で使うパスワードファイル |
| `get.sh` | Apache access log を `xss_attacker/get_acount.pl` へ流す補助スクリプト |

---

## 2. 収録デモ一覧

### 2.1 メイン脆弱性デモ（`demo/`）

`demo/index.html` からアクセスします。

- SQL Injection (`demo/SQLi`)
- Command Injection (`demo/Commandi`)
- Cross-Site Scripting / XSS (`demo/XSS`)
- HTTP Header Injection (`demo/HTTPheaderi`)
- Path Traversal (`demo/PathTraversal`)
- CSS Injection (`demo/CSSi`)
- Relative Path Overwrite / RPO (`demo/RPO`)
- Server-Side Template Injection / SSTI (`demo/SSTi`)
- CSRF (`demo/CSRF`)
- Set-Cookie / HttpOnly挙動確認 (`demo/setcookie.php`)
- PHP環境確認 (`demo/phpinfo.php`)

### 2.2 連携・補助シナリオ

- **オークションサイト（被害側）**: `auction/`
  - `index.cgi` / `login.cgi` / `list.cgi` / `logout.cgi`
- **攻撃者サイト（XSS用）**: `xss_attacker/`
  - `index.html`（罠ページ）
  - `get.cgi`（資格情報をクエリに載せて遷移）
  - `get_acount.pl`（ログ監視通知）
- **WebSocket関連**: `wstest/`
  - `index.html`（起動手順・導線）
  - `CSWSH.html`（Cross-Site WebSocket Hijacking）
- **認証デモ用コンテンツ**:
  - `private/`（Basic認証配下のページ想定）
  - `digest/`（Digest認証配下のページ想定）

---

## 3. セットアップ（講座運用向け）

### 3.1 推奨環境

- PHP が動くWebサーバー（Apache / nginx + php-fpm）
- MySQL（または互換DB）
- Perl（CGIデモの実行用）
- Node.js（`wstest` を動かす場合）

### 3.2 DB初期化

`mysql.dump` を `vuln` データベースとしてインポートして利用してください。  
アプリ側はサンプルとして `root` / `toor` を前提にしている箇所があります（講座環境に合わせて調整可）。

### 3.3 認証デモ（Basic / Digest）

- `private/` と `digest/` は静的コンテンツです。  
- 実際の認証制御はWebサーバー設定で行います（`passfile`, `passfile.digest` を利用）。

### 3.4 XSS攻撃シナリオ補助

`get.sh` は以下の処理を行います。

```sh
tail /var/log/apache2/access.log | perl /var/www/html/xss_attacker/get_acount.pl
```

講座で「ログから漏えい情報を拾う」流れを再現する際に利用できます。

---

## 4. 講座での進め方（推奨）

1. 脆弱性の概要を説明
2. 正常系操作を確認
3. PoCで挙動を再現
4. サーバー側コードを確認して原因特定
5. 対策方針（入力検証・出力エスケープ・トークン検証・権限管理）を整理
6. 可能なら修正例を実装して再検証

---

## 5. 言語ポリシー

- 全体として英語UI化を進めています。
- ただし講座都合で一部サンプル値（例: `demo/SQLi/index.html` の「上野宣」）は日本語を維持しています。

---

## 6. 注意事項

- 必ず閉域/ローカル環境で実行する
- 実在サービス・実在アドレスへの攻撃/送信を行わない
- 脆弱なコードを業務システムへ流用しない
- 本リポジトリは教育用途であり、セキュア実装の雛形ではない

---

## 7. 免責

本リポジトリの内容は教育目的です。  
利用によって生じたいかなる損害についても、作成者は責任を負いません。
