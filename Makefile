install:
	composer install --no-interaction --prefer-source --no-dev
	php artisan key:generate
	php artisan ui bootstrap

migrate:
	php artisan migrate:fresh --seed --seeder=DatabaseSeeder

start:
	php artisan serve --port=8080 --host=0.0.0.0