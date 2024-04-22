<?php

use SextaNet\LaravelWebpay\Models\WebpayOrder;
use SextaNet\LaravelWebpay\Models\WebpayResponse;

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
