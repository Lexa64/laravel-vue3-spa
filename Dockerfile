FROM php:8.3-fpm

WORKDIR /var/www

RUN apt -y update

RUN apt install -y nodejs npm libzip-dev git mc \
    libnss3 libdbus-1-3 libatk1.0-0 libatk-bridge2.0-0 libcups2 libdrm2 libxkbcommon0 libxcomposite1 libxdamage1 libxfixes3 libxrandr2 libgbm1 libxkbcommon0 libasound2 \
    --no-install-recommends \
    && pecl install xdebug \
    && docker-php-ext-install pdo pdo_mysql zip exif \
    && docker-php-ext-enable xdebug

# Chrome и зависимости
RUN apt-get update && apt-get install -y \
    wget \
    gnupg \
    && wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | apt-key add - \
    && echo "deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google.list \
    && apt-get update \
    && apt-get install -y \
    google-chrome-stable \
    fonts-ipafont-gothic \
    fonts-wqy-zenhei \
    fonts-thai-tlwg \
    fonts-kacst \
    fonts-freefont-ttf \
    libxss1 \
    --no-install-recommends \
    && rm -rf /var/lib/apt/lists/*

# ImageMagick
RUN apt-get update && apt-get install -y \
    libmagickwand-dev \
    imagemagick \
    && pecl install imagick \
    && docker-php-ext-enable imagick

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ARG USER_UID=1000
ARG USER_GID=$USER_UID

ARG USERNAME=laravel
RUN groupadd --gid $USER_GID $USERNAME \
    && useradd --uid $USER_UID --gid $USER_GID -m $USERNAME

USER $USERNAME
