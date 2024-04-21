<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('webpay_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('webpay_orders');
            $table->timestamps();
        });
    }
};
