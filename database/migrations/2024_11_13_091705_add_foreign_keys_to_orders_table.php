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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign(['buyer_uid'], 'fk_orders_buyer_users')->references(['user_uid'])->on('users')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['delivery_location_id'], 'fk_orders_locations')->references(['location_id'])->on('locations')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['seller_uid'], 'fk_orders_sellers_users')->references(['user_uid'])->on('users')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('fk_orders_buyer_users');
            $table->dropForeign('fk_orders_locations');
            $table->dropForeign('fk_orders_sellers_users');
            $table->dropIndex('fk_orders_buyer_users');
            $table->dropIndex('fk_orders_locations');
            $table->dropIndex('fk_orders_sellers_users');
        });
    }
};
