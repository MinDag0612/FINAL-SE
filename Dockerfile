FROM php:8.1-apache

# Cài các extension cần thiết, bao gồm cả mysqli
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql mysqli

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable mod_rewrite cho Apache
RUN a2enmod rewrite

# Copy source vào container
COPY ./src /var/www/html

# Set quyền cho Apache
RUN chown -R www-data:www-data /var/www/html

# Cài đặt thư viện PHP nếu cần
WORKDIR /var/www/html
RUN composer install
