<?php

namespace SextaNet\LaravelWebpay\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebpayResponse extends Model
{
    public function order(): BelongsTo
    {
        return $this->belongsTo(WebpayOrder::class);
    }
}
