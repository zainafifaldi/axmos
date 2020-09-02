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
composer dump-autoload
```

4. Generate application key (This will add key to your APP_KEY inside .env file automatically)
``` sh
php artisan key:generate
```

5. Create database with name as in your .env file

6. Run database migration
``` sh
php artisan migrate
php artisan db:seed
```

7. Run server with artisan (Server will running in port `8000`)
``` sh
php artisan serve
```

## How to Use (API Documentation)
To use the API, change `{{axmos_host}}` with active Axmos Host, eg: `http://localhost:8000`
1. Tennis Player
* Run Load Ball Into Container
``` sh
POST {{axmos_host}}/api/tennis-players/containers
Body:
{
  total_containers: 100 # (integer, required)
}
```

2. Online Store
* Get All Products
``` sh
GET {{axmost_host}}/api/online-stores/products
```

* Create New Order
``` sh
POST {{axmost_host}}/api/online-stores/orders
Body:
{
  user_id: 1, # (integer, required)
  product_id: 1, # (integer, required)
  quantity: 2 # (integer, required)
}
```

* Get All Orders
``` sh
GET {{axmost_host}}/api/online-stores/orders
```

3. Home Key
* Find Key
``` sh
POST {{axmost_host}}/api/home-keys/finders
```

## Testing Race Condition (Online Store Minus Quantity-s Problem Case)
To test this problem case, open the URL and follow instructions inside
``` sh
{{axmost_host}}/online-store/test
```
Notes: On local environment, Axmos can't serve concurrent request at the same time. Use duplicating project to test it.
