<?php

namespace SextaNet\LaravelWebpay\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class WebpayOrder extends Model
{
    public function orderable(): MorphTo
    {
        return $this->morphTo(); // TODO: Without test
    }

    public function addTokenWithUrl(string $token, string $url)
    {
        return $this->update([
            'token' => $token,
            'url' => $url,
        ]);
    }

    public function scopeFindByToken(Builder $builder, string $token): void
    {
        $builder->where('token', $token)
            ->firstOrFail();
    }

    public function scopeFindByBuyOrder(Builder $builder, string $buy_order): void
    {
        $builder->where('buy_order', $buy_order)
            ->firstOrFail();
    }

    public function scopeOld(Builder $builder, int $past_hours = 48): void
    {
        $builder->whereDate('created_at', '<', now()->subHours($past_hours)->format('Y-m-d H:i:s'));
    }

    public function responses(): HasMany
    {
        return $this->hasMany(WebpayResponse::class, 'order_id');
    }
}
