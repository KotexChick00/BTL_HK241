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
        Schema::table('r_cart_product_variant', function (Blueprint $table) {
            $table->foreign(['variant_id', 'product_id'], 'fk_r_cart_product_variant_product_variants')->references(['variant_id', 'product_id'])->on('product_variants')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['cart_id', 'buyer_uid'], 'fk_r_cart_product_variant_shopping_carts')->references(['cart_id', 'buyer_uid'])->on('shopping_carts')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('r_cart_product_variant', function (Blueprint $table) {
            $table->dropForeign('fk_r_cart_product_variant_product_variants');
            $table->dropForeign('fk_r_cart_product_variant_shopping_carts');
        });
    }
};
