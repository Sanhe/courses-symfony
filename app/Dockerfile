FROM composer:latest AS composer
FROM php:7.4-fpm-alpine

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/app/

# Set working directory
WORKDIR /var/www/app

# Install dependencies
#RUN   apk update \
#  &&   apk add ca-certificates wget \
#  &&   update-ca-certificates
#RUN docker-php-ext-install mysqli && \
#    docker-php-ext-install pdo_mysql

RUN apk add --no-cache curl wget unzip
RUN apk update && apk upgrade
RUN apk add unit unit-php7
RUN apk add php7 php7-fpm php7-mysqli php7-opcache php7-gd php7-mysqli php7-zlib php7-curl php7-phar php7-json php7-mbstring

# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

## Add user for laravel application
#RUN groupadd -g 1000 www
#RUN useradd -u 1000 -ms /bin/bash -g www www
#
## Copy existing application directory contents
#COPY . /var/www/app
#
## Copy existing application directory permissions
#COPY --chown=www:www . /var/www/app
#
## Change current user to www
#USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
#CMD ["php-fpm", "composer install"]
CMD ["php-fpm"]
