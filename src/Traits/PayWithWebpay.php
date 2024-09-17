<?php

namespace SextaNet\LaravelWebpay\Traits;

use SextaNet\LaravelWebpay\Exceptions\MissingAmount;
use SextaNet\LaravelWebpay\Exceptions\MissingBuyOrder;
use SextaNet\LaravelWebpay\Exceptions\MissingMarkAsPaidWithWebpay;
use SextaNet\LaravelWebpay\Facades\LaravelWebpay;

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
        return throw new MissingMarkAsPaidWithWebpay;
    }

    public function payWithWebpay()
    {
        return LaravelWebpay::create($this);
    }
}
