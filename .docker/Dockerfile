FROM composer:2 as composer_stage

WORKDIR /var/www/html

COPY . .

RUN \
    composer install \
    --ignore-platform-reqs \
    --prefer-dist \
    --no-scripts \
    --no-progress \
    --no-interaction \
    # --no-dev \
    --no-autoloader

RUN \
    composer dump-autoload \
    --optimize \
    --apcu
    # --no-dev

FROM node:19 as node_stage

COPY --from=composer_stage /var/www/html /var/www/html

WORKDIR /var/www/html

# RUN npm install

RUN npm config set "@fortawesome:registry" https://npm.fontawesome.com/
# RUN npm config set "//npm.fontawesome.com/:_authToken" ${FONT_AWESOME_TOKEN}
RUN npm config set "//npm.fontawesome.com/:_authToken" 570F212B-F807-46E1-8F3D-F0153C4AABEB

# TODO change to npm ci
# npm ci; \
RUN npm install
RUN npm run prod

FROM php:8.1-fpm

COPY --from=node_stage /var/www/html /var/www/html

COPY ./.docker/files/php.ini  /usr/local/etc/php/conf.d

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    nano \
    libmagickwand-dev \
    libmagickcore-dev
#     build-essential \
#     libpng-dev \
#     libjpeg62-turbo-dev \
#     libfreetype6-dev \
#     locales \
#     zip \
#     jpegoptim optipng pngquant gifsicle \
#     vim \
#     unzip \
#     git \
#     curl \
#     libzip-dev

# RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# RUN \
#      docker-php-ext-install pdo_mysql mbstring zip exif pcntl; \
#      docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/; \
#      docker-php-ext-install gd

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www

COPY --chown=www:www . /var/www/html

RUN pecl install imagick

USER www

RUN \
    php artisan key:generate; \
    php artisan config:cache; \
    php artisan route:cache; \
    php artisan view:cache;

EXPOSE 80

# CMD ["php-fpm", "-F",]
CMD [ "php", "artisan", "serve", "--port=80", "--host=0.0.0.0" ]