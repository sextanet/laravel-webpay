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

describe('find by token', function () {
    test('exists', function () {
        $order = WebpayOrder::factory()->create([
            'token' => 1234,
        ]);

        $found = WebpayOrder::findByToken(1234);

        expect($found->count())
            ->toBe(1);
    });

    test("doesn't exists", function () {
        $order = WebpayOrder::factory()->create([
            'token' => 1234,
        ]);

        WebpayOrder::findByToken(12346);
    })->expectException(\Exception::class);
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

it('knows what are old', function () {
    $actual = WebpayOrder::factory()->create([
        'created_at' => now(),
    ]);

    $more_than_48_hours = WebpayOrder::factory()->create([
        'created_at' => now()->subHours(50),
    ]);

    expect(WebpayOrder::old()->count())
        ->toBe(1);

    expect(WebpayOrder::old()->first()->id)
        ->toBe($more_than_48_hours->id);
});

it('has many responses', function () {
    $order = WebpayOrder::factory()->create();

    $response = WebpayResponse::factory()->create([
        'order_id' => $order->id,
    ]);

    expect($order->responses->first())
        ->toBeInstanceOf(WebpayResponse::class);
});
