FROM php:8.0-apache

### Dockerコンテナ内のサーバー設定
# 既存のパッケージをアップデート
RUN apt-get update
# 追加でパッケージをインストール
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libzip-dev zip libicu-dev
# 不要なキャッシュを削除
RUN apt-get clean

### PHP設定
# install-php-extensionsをダウンロード
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions
# install-php-extensionsをインストール
RUN install-php-extensions opcache intl gd exif iconv imagick mysqli pdo_mysql redis xdebug
# php.iniを配置
COPY php/php.ini /usr/local/etc/php/
# php.iniのパーミッションを変更
RUN chmod 644 /usr/local/etc/php/php.ini

### Apache設定
# モジュールを有効化
RUN a2enmod deflate expires rewrite
# デフォルトのサイト設定を無効化
RUN a2dissite 000-default
# VirtualHostの設定ファイルを配置
# COPY ./vhosts/vhosts.conf /etc/apache2/sites-available/
# VirtualHostの設定を有効化
# RUN a2ensite vhosts