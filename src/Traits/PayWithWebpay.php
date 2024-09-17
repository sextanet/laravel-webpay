<?php

namespace SextaNet\LaravelWebpay\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use SextaNet\LaravelWebpay\Exceptions\MissingAmount;
use SextaNet\LaravelWebpay\Exceptions\MissingBuyOrder;
use SextaNet\LaravelWebpay\Exceptions\MissingMarkAsPaidWithWebpay;
use SextaNet\LaravelWebpay\Facades\LaravelWebpay;
use SextaNet\LaravelWebpay\Models\WebpayOrder;
use SextaNet\LaravelWebpay\Models\WebpayResponse;

trait PayWithWebpay
{
    public function getBuyOrderAttribute(): string
    {
        return $this->id ?? throw new MissingBuyOrder;
    }

    public function getAmountAttribute(): string
    {
        return $this->amount ?? throw new MissingAmount;
    }

    public function getSessionIdAttribute(): string
    {
        return md5($this->getBuyOrderAttribute());
    }

    public function markAsPaidWithWebpay()
    {
        return view('webpay::responses.approved');
    }

    public function payWithWebpay()
    {
        return LaravelWebpay::create($this);
    }

    public function webpay_order()
    {
        return $this->morphOne(WebpayOrder::class, 'orderable');
    }

    public function webpay_responses(): HasMany
    {
        return $this->hasMany(WebpayResponse::class, 'order_id');
    }
}
