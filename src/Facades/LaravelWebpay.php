<?php

namespace SextaNet\LaravelWebpay\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SextaNet\LaravelWebpay\LaravelWebpay
 */
class LaravelWebpay extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SextaNet\LaravelWebpay\LaravelWebpay::class;
    }
}
