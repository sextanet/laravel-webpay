<?php

use SextaNet\LaravelWebpay\Tests\TestCase;

uses(TestCase::class)->in(__DIR__);

expect()->extend('toBeView', function ($expected, $variables) {
    $view = $this->value->render();

    expect($view)
        ->toBe(view($expected, $variables)->render());
});
