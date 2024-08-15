FROM php:8.3-fpm

WORKDIR /var/www

RUN apt -y update

RUN apt install -y nodejs npm libzip-dev git mc --no-install-recommends \
    && pecl install xdebug \
    && docker-php-ext-install pdo pdo_mysql zip exif \
    && docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ARG USER_UID=1000
ARG USER_GID=$USER_UID

ARG USERNAME=laravel
RUN groupadd --gid $USER_GID $USERNAME \
    && useradd --uid $USER_UID --gid $USER_GID -m $USERNAME

USER $USERNAME
