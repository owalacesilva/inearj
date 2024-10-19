install:
	composer install --no-interaction --prefer-dist --no-dev
	php artisan key:generate

migrate:
	php artisan migrate

start:
	php artisan serve --port=8080 --host=0.0.0.0