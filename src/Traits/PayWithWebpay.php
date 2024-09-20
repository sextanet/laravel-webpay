<?php

namespace SextaNet\LaravelWebpay\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use SextaNet\LaravelWebpay\Exceptions\MissingAmount;
use SextaNet\LaravelWebpay\Exceptions\MissingBuyOrder;
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
        $latest_response = $this->latest_webpay_response;
        $responses = $this->webpay_responses;
        $order = $this->webpay_order;

        return view('webpay::responses.approved', compact('latest_response', 'responses', 'order'));
    }

    public function showDefaultCancelledView()
    {
        $latest_response = $this->latest_webpay_response;
        $responses = $this->webpay_responses;
        $order = $this->webpay_order;

        return view('webpay::responses.cancelled', compact('latest_response', 'responses', 'order'));
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

    public function latest_webpay_response(): HasOne
    {
        return $this->hasOne(WebpayResponse::class, 'order_id')->latestOfMany();
    }
}
