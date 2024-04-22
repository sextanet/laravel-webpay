<?php

namespace SextaNet\LaravelWebpay\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use SextaNet\LaravelWebpay\Models\WebpayResponse;

class WebpayResponseFactory extends Factory
{
    protected $model = WebpayResponse::class;

    public function definition()
    {
        return [
            'order_id' => WebpayOrder::factory(),
        ];
    }
}
