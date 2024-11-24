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
        Schema::create('r_order_product_variant', function (Blueprint $table) {
            $table->integer('order_id');
            $table->integer('variant_id');
            $table->integer('product_id');
            $table->integer('quantity');

            $table->index(['variant_id', 'product_id'], 'fk_r_order_product_variant_product_variants');
            $table->primary(['order_id', 'variant_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_order_product_variant');
    }
};
