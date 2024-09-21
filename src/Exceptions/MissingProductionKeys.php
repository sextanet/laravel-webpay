<?php

namespace SextaNet\LaravelWebpay\Exceptions;

class MissingProductionKeys extends Exception
{
    public function message()
    {
        return 'Commerce code and secret key are required when you are in production mode';
    }
}
