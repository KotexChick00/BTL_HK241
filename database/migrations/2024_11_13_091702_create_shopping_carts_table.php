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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->integer('cart_id');
            $table->integer('buyer_uid')->index('fk_shopping_carts_users');

            $table->unique(['cart_id', 'buyer_uid'], 'idx_shopping_carts_cart_id_buyer_uid');
            $table->primary(['cart_id', 'buyer_uid']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_carts');
    }
};
