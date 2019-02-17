FROM php:7.2-fpm-alpine

# Laravel module
RUN docker-php-ext-install bcmath

#develop
RUN apk add --no-cache $PHPIZE_DEPS && pecl install xdebug