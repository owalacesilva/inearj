FROM debian:stable-slim

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
        apt-transport-https \
        lsb-release \
        software-properties-common \
        ca-certificates \
        wget

# Add the PHP repository and update the package list
# RUN add-apt-repository ppa:ondrej/php && \
#     apt-get update

# Install PHP and other dependencies
RUN apt-get install -y \
    git \
    curl \
    vim \
    nginx \
    make \
    php8.2 \
    php8.2-cli \
    php8.2-bz2 \
    php8.2-curl \
    php8.2-mbstring \
    php8.2-intl \
    php8.2-fpm \
    php8.2-pgsql \
    php-xml

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Copy only the necessary files to install PHP dependencies
COPY composer.json composer.lock ./

# Install PHP dependencies using the Composer image
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Copy the rest of the application
COPY . .

# COPY .deploy/nginx/nginx.conf /etc/nginx/http.d/default.conf

# Give ownership of the application to the www-data user
RUN chown -R www-data:www-data /var/www/html

# Copy custom PHP configuration
COPY .deploy/php/php.ini /etc/php/8.2/cli/php.ini

# Generate the application key
RUN make install

RUN chown -R www-data:www-data /var/www/html/vendor && \
    chmod -R 775 /var/www/html/vendor

# Expose port 8080
EXPOSE 8080

# Create command to run nginx
CMD ["nginx", "-g", "daemon off;"]