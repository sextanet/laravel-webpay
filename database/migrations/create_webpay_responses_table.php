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
            $table->string('vci');
            $table->string('status');
            $table->string('response_code');
            $table->string('amount');
            $table->string('authorization_code');
            $table->string('payment_type_code');
            $table->string('accounting_date');
            $table->unsignedInteger('installments_number');
            $table->unsignedInteger('installments_amount')->nullable();
            $table->string('session_id');
            $table->string('buy_order');
            $table->string('card_number');
            $table->json('card_detail');
            $table->string('transaction_date');
            $table->string('balance')->nullable();
            $table->timestamps();
        });
    }
};
