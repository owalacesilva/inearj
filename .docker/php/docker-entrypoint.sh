#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e

# Check if .env file exists, if not copy from .env.example
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Run database migrations
# php artisan migrate --force

# Seed the database
# php artisan db:seed --force

# Clear and cache configuration
# php artisan config:clear
# php artisan config:cache

# Clear and cache routes
# php artisan route:clear
# php artisan route:cache

# Clear and cache views
# php artisan view:clear
# php artisan view:cache

# Execute the main container command
exec "$@"