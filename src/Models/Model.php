<?php

namespace SextaNet\LaravelWebpay\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class Model extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
}
