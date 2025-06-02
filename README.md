Task Manager App (Laravel 10 + Sail + Breeze)

これは Laravel 10 をベースに、Docker (Laravel Sail) と Breeze を活用して構築されたタスク管理アプリです。

🚀 環境構成

Laravel 10.x

PHP 8.4

MySQL (Docker / Sail)

Laravel Breeze（Blade + Tailwind CSS）

Laravel Sail（Dockerベースの開発環境）

🛠️ 開発環境の立ち上げ

以下の手順でローカル環境を構築できます：

git clone <https://github.com/Yoalsfbin/task-manager-app.git>
cd task-manager-app
cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev

✅ アクセス

Webアプリ: <http://localhost>

Breeze ログイン画面: /login

Breeze 登録画面: /register

🔒 認証機能

Laravel Breeze を使って以下が実装されています：

ユーザー登録 / ログイン / ログアウト

認証後にアクセスできるダッシュボード (/dashboard)

認証関連のルーティングは routes/auth.php に分離管理

🧱 技術要素

要素

詳細

Laravel Breeze

Blade + Tailwind CSS で簡易UI付き認証を提供

Laravel Sail

Dockerベースの統一開発環境構築

Tailwind CSS

シンプルなデザインのCSSフレームワーク

MySQL

データベース（Sail経由で自動起動）

✍️ 今後やること
執筆中。。。

🙋‍♂️ 補足

.env は含めていませんが、.env.example をコピーして使用できます。

Docker, Composer, Node.js, npm のインストールが必要です。

