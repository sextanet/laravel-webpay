<?php

namespace SextaNet\LaravelWebpay\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebpayResponse extends Model
{
    protected $casts = [
        'card_detail' => 'array',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(WebpayOrder::class);
    }
}
