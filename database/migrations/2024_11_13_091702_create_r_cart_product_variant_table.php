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
        Schema::create('r_cart_product_variant', function (Blueprint $table) {
            $table->integer('variant_id');
            $table->integer('product_id');
            $table->integer('cart_id');
            $table->integer('buyer_uid');
            $table->integer('quantity');

            $table->index(['cart_id', 'buyer_uid'], 'fk_r_cart_product_variant_shopping_carts');
            $table->primary(['variant_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_cart_product_variant');
    }
};
