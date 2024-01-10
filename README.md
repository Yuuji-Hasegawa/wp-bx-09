# wp-bx-00

- WordPress テーマ、[BX-00](https://demo.bbns.jp/bx-00/)のリポジトリです
- 当テーマで使用している CSS、JS、画像については[html-bx-00](https://github.com/Yuuji-Hasegawa/html-bx-00)をお使いいただくか、別途用意の上加工してください
- favicon.ico と favicon.svg の両方を用意しています
- PWA、ダークモード、レスポンシブは標準装備です
- WP-CLI の使用を想定しています
- 各種設定は必要に応じて編集してください

## 使い方（と想定シチュエーション）

1. zip 形式で本リポジトリをダウンロード or `git clone xx` で別の名前をつけて clone
2. zip ファイルを解凍し、フォルダ名を任意のプロジェクト名に変更する or `git remote set-url origin xx` で任意のリポジトリに紐付ける
3. プロジェクトのディレクトリに移動し、`wp core download --locale=ja` コマンドを実行して WordPress をダウンロードする。MAMP 等を立ち上げ、当該ディレクトリにアクセスの上、WordPress をインストールしてください。WP-CLI で操作する場合、`Database hostname`に注意してください
4. 使用するテーマを bx-00 に変更し、パーマリンクを変更してください
5. Contact Form7 等のプラグインをインストール、有効化
6. 固定ページや投稿を、`wp post generate`[wp post generate](https://developer.wordpress.org/cli/commands/post/generate/)で生成し、既存ページの slug 等を変更してください
7. 各種設定は必要に応じて編集してください

## wp-cli のインストール方法

https://wp-cli.org/ja/

（や辺りは特に）

## 想定プラグイン

1. Akismet Anti-spam: Spam Protection
2. Advanced Custom Fields
3. Contact Form7（＋ reCAPTCHA v3）
4. Honeypot for Contact Form 7
5. Flamingo
6. Edit Author Slug
7. EWWW Image Optimizer
8. WP Mail SMTP
9. WP Multibyte Patch
10. XML Sitemap Generator for Google
11. zipaddr-jp

`wp plugin install akismet contact-form-7 contact-form-7-honeypot edit-author-slug ewww-image-optimizer google-sitemap-generator wp-multibyte-patch advanced-custom-fields flamingo wp-mail-smtp zipaddr-jp`

## 主要な変更箇所（想定）

1. テーマ名を変更する場合は、`.gitignore`内のテーマ名部分、`wp-bx-00/style.css`を編集してください
2. 各サイトの設計に合わせ、`wp-bx-00/lib/breadcrumb.php`、`wp-bx-00/lib/json-ld.php`を編集ください
3. 固有名詞や favicon、フォントの preload は、`wp-bx-00/lib/setting.json`、、`wp-bx-00/lib/head.php`、`wp-bx-00/pwa/manifest.json`、`wp-bx-00/pwa/sw.js`を編集ください
4. `page-hoge.php`の`hoge`は slug に合わせて編集ください。固定ページの中身を`the_content`で流し込む場合は設定に合わせてください
5. jQuery や reCAPTCHA の読み込みを`wp-bx-00/lib/script-load.php`で制御しています。適宜編集ください
