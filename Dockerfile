FROM php:7.2-alpine
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /laravel-app
COPY ./public/.htaccess /laravel-app/.htaccess
WORKDIR /laravel-app
RUN composer install \
 --ignore-platform-reqs \
 --no-interaction \
 --no-plugins \
 --no-scripts \
 --prefer-dist 
RUN cp .env.ci .env
RUN php artisan key:generate
RUN composer dumpautoload
RUN php artisan storage:link && php artisan migrate
RUN chmod -R 777 storage
CMD php artisan serve --port=80 --host=0.0.0.0
 
EXPOSE 80
