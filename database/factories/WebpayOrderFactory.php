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
            'buy_order' => fake()->unique()->randomNumber(8),
            'session_id' => md5(fake()->unique()->randomNumber(8)),
            'amount' => fake()->randomFloat(2, 1000, 10000),
        ];
    }
}
