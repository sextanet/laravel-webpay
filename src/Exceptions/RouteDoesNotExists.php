<?php

namespace SextaNet\LaravelWebpay\Exceptions;

class RouteDoesNotExists extends Exception
{
    public function __construct(public string $name) {
        $this->message = $this->message();
    }

    public function message(): string
    {
        return "Your route {$this->name} does not exists";
    }
}
