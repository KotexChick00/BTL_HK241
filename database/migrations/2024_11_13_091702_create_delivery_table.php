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
        Schema::create('delivery', function (Blueprint $table) {
            $table->integer('delivery_id', true);
            $table->integer('delivered_order_id')->index('fk_delivery_orders');
            $table->decimal('delivery_fee', 13, 3);
            $table->string('delivery_status', 16);
            $table->dateTime('estimated_arrive_time');
            $table->integer('delivery_person_id')->index('fk_delivery_delivery_partners');

            $table->primary(['delivery_id', 'delivered_order_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery');
    }
};
