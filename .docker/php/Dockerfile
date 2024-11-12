FROM php:8.2.25-alpine

ARG GITHUB_TOKEN
ENV GITHUB_TOKEN $GITHUB_TOKEN 

# Install system dependencies
RUN apk update && \
    apk add --no-cache \
    gcc \
    g++ \
    wget \
    git \
    curl \
    vim \
    nginx \
    make \
    zip \
    unzip \
    oniguruma-dev

# Download and install the PHP extension installer
RUN curl -sSLf \
    -o /usr/local/bin/install-php-extensions \
    https://github.com/mlocati/docker-php-extension-installer/releases/download/2.6.1/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions

# Install PHP extensions
RUN install-php-extensions ftp xdebug
RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring intl

# Set working directory
WORKDIR /var/www/html

# Copy only the necessary files to install PHP dependencies
COPY composer.json composer.lock ./

# Install PHP dependencies using the Composer image
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Copy the rest of the application
COPY . .

# Copy custom PHP configuration
COPY .docker/php/php.ini /etc/php/8.2/cli/php.ini
COPY .docker/nginx/nginx.conf /etc/nginx/http.d/default.conf

# Give ownership of the application to the www-data user
RUN chown -R www-data:www-data /var/www/html

# Configure Git to increase the buffer size for HTTP and HTTPS post requests.
# This is useful for handling large files or repositories with many changes.
# The buffer size is set to 1GB (1048576000 bytes).
RUN composer config --global github-oauth.github.com ${GITHUB_TOKEN}
# RUN ssh-keyscan -H github.com >> ~/.ssh/known_hosts
RUN git config --global http.postBuffer 1048576000
RUN git config --global https.postBuffer 1048576000
RUN git config --global --add safe.directory '*'

# Install PHP dependencies
# RUN make install

# Copy the entrypoint script
RUN chown -R www-data:www-data /var/www/html/vendor && \
    chmod -R 775 /var/www/html/vendor

# Expose port 8080
EXPOSE 8080
CMD ["nginx", "-g", "daemon off;"]

# Define the entrypoint
# ENTRYPOINT [ ".docker/docker-entrypoint.sh" ]