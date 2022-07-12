php artisan config:cache
php artisan config:clear
php artisan route:cache
php artisan route:clear

php artisan optimize --force
composer dumpautoload -o

To Find Laravel Version:
    php artisan -v

To Open Project In Editor:
    For Sublime:
        subl projectName
        subl . (If you are inside project)

    For VSCode:
        code projectName
        code . (If you are inside project)

Install Laravel Specific Version:
    composer create-project laravel/laravel="5.8" Laravelv58
    and
    composer create-project laravel/laravel="6.*" Laravelv6
    Or
    composer create-project laravel/laravel Laravelv8 "8.*"
    Or
    composer create-project laravel/laravel Laravelv8

