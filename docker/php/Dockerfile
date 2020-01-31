FROM php:7.4.2-fpm-alpine3.11

LABEL maintainer="umarbatalov@mail.ru"

# Install gmp
RUN apk add --no-cache gmp gmp-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql gmp
RUN docker-php-ext-configure opcache --enable-opcache && \
    docker-php-ext-install opcache

# Composer
# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer global require "hirak/prestissimo:^0.3" --prefer-dist --no-progress --no-suggest --classmap-authoritative \
    && composer clear-cache
# -- Composer

WORKDIR /srv

COPY ./composer.*  ./

RUN composer install \
        --prefer-dist \
        --no-progress \
        --no-suggest \
    && composer update --lock \
    && composer clear-cache

CMD ["php-fpm"]

EXPOSE 9000
