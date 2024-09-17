<?php

namespace SextaNet\LaravelWebpay;

use SextaNet\LaravelWebpay\Traits\StoreDB;
use Transbank\Webpay\WebpayPlus\Transaction;

abstract class BaseWebpay
{
    use StoreDB;

    public static function instance(): Transaction
    {
        $instance = new Transaction;

        if (! config('webpay.in_production')) {
            return $instance;
        }

        return $instance->configureForProduction(
            config('webpay.commerce_code'),
            config('webpay.secret_key')
        );
    }
}
