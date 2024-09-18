<?php

use SextaNet\LaravelWebpay\Enums\PaymentTypeCode;
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
});

it('has payment type code as enum', function () {
    $response = WebpayResponse::factory()->create();

    expect($response->payment_type_code)
        ->toBeInstanceOf(PaymentTypeCode::class);
});

it('has payment type code as enum (description)', function () {
    $response = WebpayResponse::factory()->create([
        'payment_type_code' => PaymentTypeCode::VD,
    ]);

    expect($response->payment_type_code->getDescription())
        ->toBe('Venta Débito');
});

it('belongs to a order', function () {
    $order = WebpayOrder::factory()->create();

    $response = WebpayResponse::factory()->create([
        'order_id' => $order->id,
    ]);

    expect($response->order)
        ->toBeInstanceOf(WebpayOrder::class);
});
