# Expense management API

## Installation & Setup
- Application is built using Laravel v8.x. Copy/clone this repository and install it's dependencies using:

```
$ composer install
```
More info can be found at https://laravel.com/docs/8.x/installation

- Create a `.env` file by duplicating `.env.example` and update database + other relevant credentials on there.

More info can be found at https://laravel.com/docs/8.x/configuration   

- Lastly, run the following command to create the database schema:

```
$ php artisan migrate
```

## Tests

Use the following command to run tests:

```
$ ./vendor/bin/phpunit
```

## Basic Usage

Swagger documentation is available at the route `/api/docs`. JSON specification file is available at `storage/api-docs/api-docs.json` 

**Note** : Update `APP_DEBUG=false` in the `.env` file to turn off displaying stack trace for error responses.