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

## Usage

### With attached model (recommended)

```php
// app/Models/YourModel.php

class YourModel
{
    use HasFactory;

    use \SextaNet\LaravelWebpay\Traits\PayWithWebpay; // 👈 1 Import trait
}
```

By default, it uses these 3 fields which are required by Transbank:

| Name       | Description                            | Example                          |
|------------|----------------------------------------|----------------------------------|
| amount     | Total price (integer format)           | 10000                            |
| order_id   | Unique identifier for your transaction | 1                                |
| session_id | Unique session for your transaction    | 23d6436f95b1987cd616b85bae806649 |

If you use other names for your fields, no problem: you can make each model recognize them very easily using the following magic methods:

```php
// app/Models/YourModel.php

public function getBuyOrderAttribute(): string
{
    return $this->id;
}

public function getAmountAttribute(): string
{
    return $this->price;
}

public function getSessionIdAttribute(): string
{
    return md5($this->id);
}
```

```php
// In your controller or equivalent

$order = YourOrder::where('id', 1)->first();

return $order->payWithWebpay(); // 👈 2) Done!
```

Easy peasy!

### Testing cards

|Type        |Numbers         |Result  |
|------------|----------------|--------|
|VISA        |4051885600446623|Approved|
|Mastercard  |5186059559590568|Rejected|
|Redcompra   |4051884239937763|Approved|
|VISA Prepaid|4051886000056590|Approved|

- Expire date: (Any valid date)
- RUT: 11111111-1
- Password: 123

Source: [Official Transbank Developers website](https://www.transbankdevelopers.cl/documentacion/como_empezar#tarjetas-de-prueba)

### Production mode

When you are ready to be in production, you need to set `WEBPAY_IN_PRODUCTION` to `true`, and specify `WEBPAY_COMMERCE_CODE` and `WEBPAY_SECRET_KEY`.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
