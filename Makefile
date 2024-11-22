# Start the Docker containers defined in docker-compose.yml
up:
	docker compose --file docker-compose.yml up

# Stop and remove Docker containers, networks, images, and volumes
down:
	docker compose down

# Install PHP dependencies using Composer
install:
	composer install --no-interaction --prefer-source --no-dev --profile --verbose

# Drop all tables, re-run all migrations, and seed the database
migrate:
	php artisan migrate:fresh --seed --seeder=DatabaseSeeder

# Start the Laravel development server
start:
	php artisan serve --port=${APP_PORT} --host=0.0.0.0

# Run the custom Artisan command to consume INEA report files
report:
	php artisan app:consume-inea-report-files-command

# Run the Laravel scheduler
schedule:
	php artisan schedule:run