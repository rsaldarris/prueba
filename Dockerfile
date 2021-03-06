FROM php:7.2-apache-stretch
RUN apt-get update -y && apt-get install -y openssl zip unzip git libpng-dev
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install gd
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/html
WORKDIR /var/www/html
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist
RUN composer update
RUN composer require maatwebsite/excel --ignore-platform-reqs
RUN php artisan key:generate
RUN php artisan migrate
RUN chmod -R 777 storage
RUN chmod 755  /var/www/html/public/img/product/
RUN chown www-data:www-data  /var/www/html/public/img/product/
RUN a2enmod rewrite
RUN service apache2 restart
