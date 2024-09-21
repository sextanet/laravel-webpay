<?php

namespace SextaNet\LaravelWebpay\Exceptions;

class MissingBuyOrder extends Exception
{
    public function message()
    {
        return 'Please set getBuyOrderAttribute()';
    }
}
