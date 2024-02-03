# プロジェクト名
テンプレート

## GitHub
URL: 未定

## 共通事項

### WordPress管理画面のログイン情報
ID: `未定`  
PW: `未定`

## ローカル環境
URL: http://localhost:8080/  
WP管理画面URL: http://localhost:8080/wp-admin/

### phpMyAdmin
URL: http://localhost:8081/  
ユーザ名: `root`  
パスワード: `1234`

### wp-config.php
データベース名: `wordpress`  
ユーザー名: `root`  
パスワード: `1234`  
データベースのホスト名: `db`

### phpMyAdmin
http://localhost:8081/  
ユーザ名: `root`  
パスワード: `1234`

## テスト環境
URL: 未定  
WP管理画面URL: 未定

### Basic認証
ID：`未定`  
pass：`未定`

### wp-config.php
データベース名: `未定`  
ユーザー名: `未定`  
パスワード: `未定`  
データベースのホスト名: `未定`

### FTP情報
プロトコル: `未定`  
ホスト: `未定`  
ポート: `未定`  
パッシブモード: `未定`  
ユーザー: `未定`  
パスワード: `未定`  
ドキュメントルート: `未定`

## 本番環境
担当ディレクター、または技術者にお問い合わせください。

## コーディング仕様
### php
`htdocs/wp-content/themes/template/`

### scss
`htdocs/wp-content/themes/template/assets/scss/`  
  
**※ CSS設計：PDFLOCSS**  
`object/project/`ディレクトリが【各ページ調整用のscss】です。  
  
参考: https://zenn.dev/wagashi_osushi/books/94efd21a66ccaa/viewer/651e84

### js
`htdocs/wp-content/themes/template/assets/js/`

### 画像
`htdocs/wp-content/themes/template/assets/images/`

### functions.php
`htdocs/wp-content/themes/template/assets/functions/functions.php`

### 固定ページ
`htdocs/wp-content/themes/template/pages/`

### カスタム投稿
`htdocs/wp-content/themes/template/posts/`

## 開発仕様
Docker@^4.22.0
- php@^8.0-apache
- mysql@^8.0.30
- phpmyadmin@^5.2.0
- mailhog@^1.0.1

Volta@^1.1.1
- node@14.19.3
- yarn@1.22.18

Gulp@^4.0.2
  
WordPress@^6.3.1
- All-in-One WP Migration@@^7.78
- WP Mail SMTP@^3.8.2

# ローカル環境の構築

## 手順1. Dockerのインストール
Docker Desktopアプリが未インストールの場合はインストールし、アプリを起動した状態にします。  

### Windowsの場合
https://chigusa-web.com/blog/windows%E3%81%ABdocker%E3%82%92%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB%E3%81%97%E3%81%A6python%E7%92%B0%E5%A2%83%E3%82%92%E6%A7%8B%E7%AF%89/

### Macの場合
https://matsuand.github.io/docs.docker.jp.onthefly/desktop/mac/install/

## 手順2. Voltaのインストール
### Windowsの場合
下記URLページの【download and run the Windows installer】をクリックして、インストーラーをダウンロード後に実行し、Voltaをインストールします。  
https://docs.volta.sh/guide/getting-started  
  
インストール後、コマンドプロンプト（またはPowerShell）で下記コマンドを入力します。
```zsh
# Voltaの確認（バージョンが表示されたらOK）
$ volta -v
```

### Macの場合
ターミナルで、下記コマンドを入力します。
```zsh
# Voltaをインストール
$ curl https://get.volta.sh | bash

# 環境変数のPath反映
$ source ~/.zshrc

# Voltaの確認（バージョンが表示されたらOK）
$ volta -v
```

## 手順3. コマンドを実行
ターミナルで下記コマンドを実行します。
```zsh
# このプロジェクトのディレクトリまで移動
$ cd 【このプロジェクトのディレクトリまでのパス】

# 環境構築（3分〜5分ほどかかります）
$ make build
```

## 手順4. WordPressの設置

### WordPressの最新バージョンをダウンロード
https://ja.wordpress.org/download/releases/

### WordPressをディレクトリに設置
`htdocs`ディレクトリにダウンロードしたファイルを解凍し、設置します。

### wp-config.phpの編集
データベース設定を下記に編集します。
```php
define('DB_NAME', 'wordpress');
define('DB_USER', 'root');
define('DB_PASSWORD', '1234');
define('DB_HOST', 'db');
```

### WordPressのセットアップ
dockerコンテナ起動後に  
http://localhost:8080/wp-admin/install.php  
にアクセスし、セットアップを行います。  
（サイトタイトル・ユーザー名・パスワード・メールアドレスなどの設定は、後述のセットアップで必要なくなるので、ログインできれば何でもいいです。）

### データベースのインポート
WordPressの管理画面にログインし、【All-in-One WP Migration】プラグインを新規追加して、本番環境のデータベースをインポートしてください。  
  
#### 【All-in-One WP Migration】プラグインの使用方法
【3. 移行元のデータをエクスポート】以降の手順を行ってください。  
https://wordpress-web.and-ha.com/wordpress-migration-steps/#index6

## 作業開始前のコマンド
```zsh
# DockerとGulpを起動
$ make up
```

## 作業終了後のコマンド
```zsh
# Gulp停止
# [Control]キーを押しながら[C]キー

# コンテナ停止
$ make down
```