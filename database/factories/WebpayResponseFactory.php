<?php

namespace SextaNet\LaravelWebpay\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use SextaNet\LaravelWebpay\Enums\Vci;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use SextaNet\LaravelWebpay\Models\WebpayResponse;

class WebpayResponseFactory extends Factory
{
    protected $model = WebpayResponse::class;

    public function definition()
    {
        return [
            'order_id' => $order = WebpayOrder::factory()->create(),
            'vci' => fake()->randomElement(Vci::class),
            'status' => fake()->randomElement(['AUTHORIZED']),
            'response_code' => fake()->randomElement(['0']),
            'amount' => fake()->randomFloat(2, 1000, 10000),
            'authorization_code' => fake()->randomNumber(4),
            'payment_type_code' => fake()->randomElement(['VD']),
            'accounting_date' => fake()->date(),
            'installments_number' => fake()->randomNumber(1),
            'installments_amount' => fake()->randomNumber(1),
            'session_id' => $order->session_id,
            'buy_order' => $order->buy_order,
            'card_number' => fake()->randomNumber(4),
            'card_detail' => [
                'card_number' => fake()->randomNumber(4),
            ],
            'transaction_date' => fake()->date(),
        ];
    }
}
