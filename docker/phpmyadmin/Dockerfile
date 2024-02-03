FROM phpmyadmin/phpmyadmin:latest

# config.user.inc.phpを配置
COPY ./config.user.inc.php /etc/phpmyadmin/
# config.user.inc.phpのパーミッションを変更
RUN chmod 644 /etc/phpmyadmin/config.user.inc.php