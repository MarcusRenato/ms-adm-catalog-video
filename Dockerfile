FROM php:8.1-fpm

RUN apt-get update && apt-get install git -y && \
    apt-get install -y zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mkdir /app

WORKDIR /app