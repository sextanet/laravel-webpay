<?php

namespace SextaNet\LaravelWebpay\Exceptions;

class MissingMarkAsPaidWithWebpay extends Exception
{
    public function message()
    {
        return 'Please set missingMarkAsPaidWithWebpay()';
    }
}
