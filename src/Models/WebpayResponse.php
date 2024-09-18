<?php

namespace SextaNet\LaravelWebpay\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use SextaNet\LaravelWebpay\Enums\Vci;

class WebpayResponse extends Model
{
    protected $casts = [
        'card_detail' => 'array',
        'vci' => Vci::class,
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(WebpayOrder::class);
    }
}
