<?php

namespace SextaNet\LaravelWebpay\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use SextaNet\LaravelWebpay\Enums\PaymentTypeCode;
use SextaNet\LaravelWebpay\Enums\Status;
use SextaNet\LaravelWebpay\Enums\Vci;

class WebpayResponse extends Model
{
    protected $casts = [
        'card_detail' => 'array',
        'vci' => Vci::class,
        'payment_type_code' => PaymentTypeCode::class,
        'status' => Status::class,
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(WebpayOrder::class);
    }
}
