composer install

php artisan key:generate

mv .env.example .env

php artisan serve --host=0.0.0.0 --port=80
