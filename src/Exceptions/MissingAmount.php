<?php

namespace SextaNet\LaravelWebpay\Exceptions;

class MissingAmount extends Exception
{
    public function message()
    {
        return 'Please set getAmountAttribute()';
    }
}
