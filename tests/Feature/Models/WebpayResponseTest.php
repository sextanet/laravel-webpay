<?php

use SextaNet\LaravelWebpay\Models\WebpayOrder;
use SextaNet\LaravelWebpay\Models\WebpayResponse;

it('belongs to a order', function () {
    $order = WebpayOrder::factory()->create();

    $response = WebpayResponse::factory()->create([
        'order_id' => $order->id,
    ]);

    expect($response->order)
        ->toBeInstanceOf(WebpayOrder::class);
});
