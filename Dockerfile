FROM php:7.0-cli-alpine

ENV PHPIZE_DEPS \
    autoconf \
    dpkg \
    dpkg-dev \
    file \
    g++ \
    gcc \
    libc-dev \
    make \
    pkgconf \
    re2c

USER root

RUN apk update \
    && apk --update add --virtual \
        build-dependencies \
        $PHPIZE_DEPS \
    && pecl install xdebug-2.5.0 \
    && docker-php-ext-enable xdebug \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

USER www-data

