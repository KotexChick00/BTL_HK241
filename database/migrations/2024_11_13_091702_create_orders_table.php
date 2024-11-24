<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('order_id', true);
            $table->dateTime('order_time');
            $table->decimal('order_total_price', 16, 3);
            $table->string('payment_method', 16);
            $table->string('order_status', 16);
            $table->integer('delivery_location_id')->index('fk_orders_locations');
            $table->integer('buyer_uid')->index('fk_orders_buyer_users');
            $table->integer('seller_uid')->index('fk_orders_sellers_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
