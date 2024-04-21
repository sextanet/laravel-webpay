<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('webpay_orders', function (Blueprint $table) {
            $table->id();
            $table->string('buy_order');
            $table->string('session_id');
            $table->float('amount');
            $table->timestamps();
        });
    }
};
