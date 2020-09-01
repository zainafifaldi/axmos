# Axmos

## Hi!
Welcome to Axmos project!

## Framework
PHP - Laravel 7.26.1

## Prerequisites
- [PHP](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/)

## How to Install
1. Clone Axmos repository
``` sh
git clone https://github.com/zainafifaldi/axmos.git
```

2. Copy environment example to your environment (Then, change values based on your machine)
``` sh
cp .env.example .env
```

3. Install vendor with composer
``` sh
composer update --no-scripts
```

4. Generate application key (This will add key to your APP_KEY inside .env file automatically)
``` sh
php artisan key:generate
```

5. Create database with name as in your .env file

6. Run database migration
``` sh
php artisan migrate
```

7. Run server with artisan
``` sh
php artisan serve
```

## How to Use (API Documentation)