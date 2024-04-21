<?php

namespace SextaNet\LaravelWebpay\Exceptions;

use Exception;

class RejectedTransaction extends Exception
{
    protected $message = 'Rejected or failed transaction';
}
