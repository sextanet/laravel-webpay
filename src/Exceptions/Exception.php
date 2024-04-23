<?php

namespace SextaNet\LaravelWebpay\Exceptions;

use Exception as BaseException;

abstract class Exception extends BaseException implements ExceptionContract
{
    public function __construct()
    {
        $this->message = $this->message();
    }
}
