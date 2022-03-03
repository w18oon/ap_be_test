# ap_be_test

# how to run
## start db by docker-compose
```docker-compose up -d```
## copy env file 
```cp .env.example .env```
## run migration for create product table
```php artisan migrate```
## run seed for generate product data
```php artisan db:seed```
## start service
```php artisan serve```