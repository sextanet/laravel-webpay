<?php

namespace SextaNet\LaravelWebpay\Exceptions;

use Exception;

class MissingToken extends Exception
{
    protected $message = 'Token is required. Please try again';
}
