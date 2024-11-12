up:
	docker compose --file docker-compose.yml up

down:
	docker compose down

install:
	rm -rf vendor
	composer install --no-interaction --prefer-source --no-dev
	php artisan key:generate
	php artisan ui bootstrap

migrate:
	php artisan migrate:fresh --seed --seeder=DatabaseSeeder

start:
	php artisan serve --port=${APP_PORT} --host=0.0.0.0

report:
	php artisan app:consume-inea-report-files-command

schedule:
	php artisan schedule:run