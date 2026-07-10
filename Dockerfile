# ১. PHP 8.2 ও Apache ইমেজ
FROM php:8.2-apache

# ২. প্রয়োজনীয় সিস্টেম লাইব্রেরি ইনস্টল
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# ৩. Node.js ইনস্টল (Vite এর জন্য ল্যাটেস্ট ভার্সন)
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# ৪. Apache Rewrite মডিউল
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

# ৫. কম্পোজার ইনস্টল (অপ্রয়োজনীয় ফাইল বাদ দিয়ে)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# ৬. ফ্রন্টএন্ড বিল্ড (র‍্যাম বাঁচাতে আলাদা আলাদা রান করা হয়েছে)
RUN npm install --frozen-lockfile --network-timeout 100000
RUN npm run build

# ৭. পারমিশন সেট করা
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# ৮. Apache কনফিগারেশন
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

EXPOSE 80

# বিল্ড করার সময় ক্যাশ ক্লিয়ার করা
RUN php artisan config:clear

CMD ["apache2-foreground"]