FROM php:7.3-fpm-stretch

ENV PHP_INI php-development.ini
ENV APP_SOURCE /var/www/app

COPY ${PHP_INI} /usr/local/etc/php/php.ini

RUN apt-get update \
    && apt-get install -y \
        git \
        curl \
        zip \
        unzip \
        libpq-dev \
        libzip-dev \
    && docker-php-ext-install -j$(nproc) mbstring pdo pdo_pgsql pgsql zip opcache zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    # xDebug
    && pecl install xdebug-2.7.1 \
    && docker-php-ext-enable xdebug \
    # Clean temp data after build
    && rm -rf /var/lib/apt/lists/* \
    && apt-get clean \

WORKDIR ${APP_SOURCE}

CMD ["php-fpm"]
