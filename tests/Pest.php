<?php

use SextaNet\LaravelWebpay\Tests\TestCase;

function expectViewIs($expected, $is)
{
    expect($expected->render())
        ->toBe($is->render());
}

uses(TestCase::class)->in(__DIR__);
