<?php

namespace SextaNet\LaravelWebpay\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WebpayOrder extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function responses(): HasMany
    {
        return $this->hasMany(WebpayResponse::class, 'order_id');
    }
}
