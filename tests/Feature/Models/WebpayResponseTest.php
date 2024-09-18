<?php

use SextaNet\LaravelWebpay\Enums\Vci;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use SextaNet\LaravelWebpay\Models\WebpayResponse;

it('has vci as enum', function () {
    $response = WebpayResponse::factory()->create();

    expect($response->vci)
        ->toBeInstanceOf(Vci::class);
});

it('belongs to a order', function () {
    $order = WebpayOrder::factory()->create();

    $response = WebpayResponse::factory()->create([
        'order_id' => $order->id,
    ]);

    expect($response->order)
        ->toBeInstanceOf(WebpayOrder::class);
});
