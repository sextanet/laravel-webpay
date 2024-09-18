<?php

use SextaNet\LaravelWebpay\Enums\Vci;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use SextaNet\LaravelWebpay\Models\WebpayResponse;

it('has vci as enum', function () {
    $response = WebpayResponse::factory()->create();

    expect($response->vci)
        ->toBeInstanceOf(Vci::class);
});

it('has vci as enum (description)', function () {
    $response = WebpayResponse::factory()->create([
        'vci' => Vci::TSY,
    ]);

    expect($response->vci->getDescription())
        ->toBe('Autenticación exitosa');
})->only();

it('belongs to a order', function () {
    $order = WebpayOrder::factory()->create();

    $response = WebpayResponse::factory()->create([
        'order_id' => $order->id,
    ]);

    expect($response->order)
        ->toBeInstanceOf(WebpayOrder::class);
});
