web: vendor/bin/heroku-php-apache2 public/
release: cp .env.example .env
release: php artisan storage:link
release: php artisan migrate:fresh
release: php artisan key:generate
release: php artisan db:seed
