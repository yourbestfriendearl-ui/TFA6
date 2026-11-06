FROM php:8.4-apache
RUN apt-get update && apt-get install -y --no-install-recommends git unzip libonig-dev libxml2-dev libsqlite3-dev libcurl4-openssl-dev \
    && docker-php-ext-install mbstring dom pdo_mysql pdo_sqlite curl \
    && a2enmod rewrite \
    && sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && printf '<Directory /var/www/html/public>\nAllowOverride All\nRequire all granted\n</Directory>\n' > /etc/apache2/conf-available/swiftpos.conf \
    && a2enconf swiftpos \
    && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader \
    && mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache database \
    && chmod +x docker/entrypoint.sh
ENV APP_ENV=production APP_DEBUG=false LOG_CHANNEL=stderr DB_CONNECTION=sqlite DB_DATABASE=/var/www/html/storage/database/database.sqlite
EXPOSE 80
ENTRYPOINT ["docker/entrypoint.sh"]
CMD ["apache2-foreground"]
