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
#RUN apk add php7 php7-fpm php7-mysqli php7-opcache php7-gd php7-mysqli php7-zlib php7-curl php7-phar php7-json php7-mbstring php7-pdo_mysql

#
#RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install dependencies
#RUN apk update && apk upgrade
#RUN apk add build-essential libpng-dev freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev zip jpegoptim optipng pngquant gifsicle vim unzip git curl
#RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
#  docker-php-ext-configure gd \
#    --with-gd \
#    --with-freetype-dir=/usr/include/ \
#    --with-png-dir=/usr/include/ \
#    --with-jpeg-dir=/usr/include/ && \
#  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
#  docker-php-ext-install -j${NPROC} gd && \
#  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

# Install extensions
RUN docker-php-ext-install pdo_mysql exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd


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
