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
        Schema::table('delivery', function (Blueprint $table) {
            $table->foreign(['delivery_person_id'], 'fk_delivery_delivery_partners')->references(['delivery_person_id'])->on('delivery_partners')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['delivered_order_id'], 'fk_delivery_orders')->references(['order_id'])->on('orders')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delivery', function (Blueprint $table) {
            $table->dropForeign('fk_delivery_delivery_partners');
            $table->dropForeign('fk_delivery_orders');
            $table->dropIndex('fk_delivery_delivery_partners');
            $table->dropIndex('fk_delivery_orders');
        });
    }
};