<?php

namespace SextaNet\LaravelWebpay\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebpayOrder extends Model
{
    public function scopeFindByBuyOrder(Builder $builder, string $buyOrder): void
    {
        $builder->where('buy_order', $buyOrder)
            ->firstOrFail();
    }

    public function responses(): HasMany
    {
        return $this->hasMany(WebpayResponse::class, 'order_id');
    }
}
