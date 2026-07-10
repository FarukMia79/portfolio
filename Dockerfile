# ১. PHP 8.2 এবং Apache ব্যবহার করছি
FROM php:8.2-apache

# ২. প্রয়োজনীয় সিস্টেম ডিপেন্ডেন্সি এবং PostgreSQL ড্রাইভার ইনস্টল করা
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

# ৩. Node.js ইনস্টল (Vite বিল্ড করার জন্য)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# ৪. Apache Rewrite Module এনাবল করা
RUN a2enmod rewrite

# ৫. ফাইলগুলো কপি করা
WORKDIR /var/www/html
COPY . .

# ৬. কম্পোজার এবং এনপিএম বিল্ড
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# ৭. ফাইল পারমিশন সেট করা
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# ৮. Apache এর রুট পাথ public ফোল্ডারে পয়েন্ট করা
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# ৯. পোর্ট এবং সার্ভার চালু (সবার শেষে)
EXPOSE 80
CMD ["apache2-foreground"]