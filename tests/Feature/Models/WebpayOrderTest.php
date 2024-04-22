<?php

use SextaNet\LaravelWebpay\Models\WebpayOrder;
use SextaNet\LaravelWebpay\Models\WebpayResponse;

it('adds token with url', function () {
    $order = WebpayOrder::factory()->create();

    $order->addTokenWithUrl('__TOKEN__', 'https://');

    expect($order->token)
        ->toBe('__TOKEN__');

    expect($order->url)
        ->toBe('https://');
});

describe('find by buyOrder', function () {
    test('exists', function () {
        $order = WebpayOrder::factory()->create([
            'buy_order' => 1234,
        ]);

        $found = WebpayOrder::findByBuyOrder(1234);

        expect($found->count())
            ->toBe(1);
    });

    test("doesn't exists", function () {
        $order = WebpayOrder::factory()->create([
            'buy_order' => 1234,
        ]);

        WebpayOrder::findByBuyOrder(12346);
    })->expectException(\Exception::class);
});

it('has many responses', function () {
    $order = WebpayOrder::factory()->create();

    $response = WebpayResponse::factory()->create([
        'order_id' => $order->id,
    ]);

    expect($order->responses->first())
        ->toBeInstanceOf(WebpayResponse::class);
});
