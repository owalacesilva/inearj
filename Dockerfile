FROM php:8.2-fpm-alpine

# Install dependencies
RUN apk add --no-cache \
    git \
    curl \
    make \
    postgresql-dev \
    php82-pdo \
    php82-pdo_pgsql

# Set working directory
WORKDIR /var/www/html

# Copy the entire application
COPY . .

COPY php/php.ini /etc/php/local/etc/php/php.ini

# Install PHP dependencies using the Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP dependencies
RUN composer install --no-interaction

# Expose port 8080
EXPOSE 8080

# Start the PHP-FPM server
CMD ["php-fpm"]