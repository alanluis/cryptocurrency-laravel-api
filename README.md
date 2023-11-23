# Cryptocurrency REST API Server

> Laravel Cryptocurrency REST API

## Requirements
- PHP >= ˆ8.1

## Quick Start / Installation

``` bash
# Install Dependencies
composer install

# Create a .env file based on env.example
cp .env.example .env

# Serve the application
php artisan serve
```

Default endpoint: http://localhost:8000/api/coins/markets

## Endpoints

### List Markets
``` bash
GET api/coins/markets
```

### Coin Details
``` bash
GET api/coins/{id}
```

## App Info

### Author

Alan Oliveira

### Version

1.0.0

### License

This project is licensed under the MIT License