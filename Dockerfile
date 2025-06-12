FROM php:8.3-fpm

WORKDIR /var/www

RUN apt -y update

RUN apt install -y nodejs npm libzip-dev git mc \
    libnss3 libdbus-1-3 libatk1.0-0 libatk-bridge2.0-0 libcups2 libdrm2 libxkbcommon0 libxcomposite1 libxdamage1 libxfixes3 libxrandr2 libgbm1 libxkbcommon0 libasound2 \
    --no-install-recommends \
    && npm install puppeteer \
    && PUPPETEER_CACHE_DIR=/usr/local/share/.cache npx puppeteer browsers install chrome-headless-shell \
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
