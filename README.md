# Laravel Webpay

![Laravel Webpay](https://sextanet.sfo2.cdn.digitaloceanspaces.com/packages/laravel-webpay/logo.webp?v2)

Laravel, Transbank, Webpay and SextaNet products and logos are property of their respective companies.

The easiest way to use Webpay in your projects

>! This package is under development. It can be unstable until official release (v2)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sextanet/laravel-webpay.svg?style=flat-square)](https://packagist.org/packages/sextanet/laravel-webpay)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/sextanet/laravel-webpay/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/sextanet/laravel-webpay/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/sextanet/laravel-webpay/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/sextanet/laravel-webpay/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/sextanet/laravel-webpay.svg?style=flat-square)](https://packagist.org/packages/sextanet/laravel-webpay)

## Installation

You can install the package via composer:

```bash
composer require sextanet/laravel-webpay
```

Publish and run migrations

```bash
php artisan vendor:publish --tag="webpay-migrations"
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

use SextaNet\LaravelWebpay\Traits\PayWithWebpay; // 👈 Import it

class YourModel
{
    // ...

    use HasFactory;
    
    use PayWithWebpay; // 👈 Use it!
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
    return $this->id; // Give it your custom logic
}

public function getAmountAttribute(): string
{
    return $this->price; // Give it your custom logic: Don't need to use decimals
}

public function getSessionIdAttribute(): string
{
    return md5($this->id); // Give it your custom logic
}
```

```php
// In your controller or equivalent

$order = YourOrder::where('id', 1)->first();

return $order->payWithWebpay(); // 👈 Done!
```

Easy peasy!

## Testing cards

|Type        |Numbers            |Result  |
|------------|-------------------|--------|
|VISA        |4051 8856 0044 6623|Approved|
|Mastercard  |5186 0595 5959 0568|Rejected|
|Redcompra   |4051 8842 3993 7763|Approved|
|VISA Prepaid|4051 8860 0005 6590|Approved|

- Expire date: (Any valid date)
- RUT: 11111111-1
- Password: 123

Source: [Official Transbank Developers website](https://www.transbankdevelopers.cl/documentacion/como_empezar#tarjetas-de-prueba)

## Production mode

When you are ready to be in production, you need to set `WEBPAY_IN_PRODUCTION` to `true`, and specify `WEBPAY_COMMERCE_CODE` and `WEBPAY_SECRET_KEY`.

## Alternative usage

If you don't want to import Trait, you can create or instanciate a order, and then, calling `LaravelWebpay::create($order)` method, for example:

```php

// In your controller or equivalent
$order = YourOrder::where('id', 1)->first();

// ❗️ Your order model needs to have: buy_order, session_id and amount fields
return LaravelWebpay::create($order);
```

## Cancelled status
Please take care about

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
