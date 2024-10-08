<?php

namespace SextaNet\LaravelWebpay\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use SextaNet\LaravelWebpay\Models\WebpayOrder;

class WebpayOrderFactory extends Factory
{
    protected $model = WebpayOrder::class;

    public function definition()
    {
        return [
            'orderable_type' => 'App\Models\Order',
            'orderable_id' => fake()->unique()->randomNumber(8),
            'buy_order' => (string) fake()->unique()->randomNumber(8),
            'session_id' => md5((string) fake()->unique()->randomNumber(8)),
            'amount' => fake()->randomFloat(2, 1000, 10000),
        ];
    }
}
