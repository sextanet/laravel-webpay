# Laravel Webpay

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sextanet/laravel-webpay.svg?style=flat-square)](https://packagist.org/packages/sextanet/laravel-webpay)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/sextanet/laravel-webpay/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/sextanet/laravel-webpay/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/sextanet/laravel-webpay/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/sextanet/laravel-webpay/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sextanet/laravel-webpay.svg?style=flat-square)](https://packagist.org/packages/sextanet/laravel-webpay)

The easiest way to use Webpay in your projects 

## Installation

You can install the package via composer:

```bash
composer require sextanet/laravel-webpay
```

Publish and run migrations

```bash
php artisan vendor:publish --tag="laravel-webpay-migrations"
php artisan migrate
```

Copy these keys in your `.env` file

```dotenv
WEBPAY_IN_PRODUCTION=false
WEBPAY_COMMERCE_CODE=
WEBPAY_SECRET_KEY=
WEBPAY_DEBUG=true
```

> Important: When you are ready to be in production, you need to set `WEBPAY_IN_PRODUCTION` to `true`, and specify `WEBPAY_COMMERCE_CODE` and `WEBPAY_SECRET_KEY`.

## Usage

```php
// In your controller or equivalent

$order = YourOrder::where('id', 1)->first();

// Your order model needs to have: buy_order, session_id and amount fields

return LaravelWebpay::create($order);
```

> Easy peasy!

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
