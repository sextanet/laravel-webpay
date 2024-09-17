<?php

use SextaNet\LaravelWebpay\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

expect()->extend('toBeView', function ($expected) {
    $view = $this->value->render();

    expect($view)
        ->toBe(view($expected)->render());
});
