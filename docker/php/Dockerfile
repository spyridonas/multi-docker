FROM php:cli-alpine

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN chmod +x /usr/local/bin/install-php-extensions
RUN install-php-extensions @composer pdo_mysql redis
WORKDIR /var/www/html
CMD composer install ; php -S 0.0.0.0:80 -t /var/www/html/public
EXPOSE 80