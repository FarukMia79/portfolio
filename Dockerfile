# ১. শুধু PHP এবং Apache ব্যবহার করব
FROM php:8.2-apache

# ২. প্রয়োজনীয় সিস্টেম লাইব্রেরি
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# ৩. Apache Rewrite মডিউল
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

# ৪. শুধু কম্পোজার ইনস্টল (এটি মেমোরি কম খায়)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# ৫. পারমিশন সেট করা
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# ৬. Apache কনফিগারেশন
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

EXPOSE 80

RUN php artisan config:clear

CMD ["apache2-foreground"]