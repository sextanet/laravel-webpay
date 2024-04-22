<?php

namespace SextaNet\LaravelWebpay\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class WebpayOrder extends Model
{
    public function responses(): HasMany
    {
        return $this->hasMany(WebpayResponse::class, 'order_id');
    }
}
