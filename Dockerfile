FROM php:8.0.24-fpm

WORKDIR /var/www

RUN apt-get update 
RUN apt-get install -y libzip-dev zip curl git libonig-dev

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer && chmod +sx /usr/local/bin/composer
