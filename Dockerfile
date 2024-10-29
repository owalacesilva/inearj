FROM debian:stable

ARG GITHUB_TOKEN
ENV GITHUB_TOKEN $GITHUB_TOKEN 

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
    libzip-dev \
    zip \
    unzip \
    php8.2 \
    php8.2-cli \
    php8.2-bz2 \
    php8.2-curl \
    php8.2-mbstring \
    php8.2-intl \
    php8.2-fpm \
    php8.2-pgsql \
    php8.2-zip \
    php-xml

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Install nvm and Node.js
# RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash \
#     && . ~/.nvm/nvm.sh \
#     && nvm install 20.11.1 \
#     && nvm use 20.11.1 \
#     && nvm alias default node

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
RUN ssh-keyscan -H github.com >> ~/.ssh/known_hosts
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
ENTRYPOINT [ ".docker/docker-entrypoint.sh" ]