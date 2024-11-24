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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->integer('variant_id', true);
            $table->integer('product_id')->index('fk_product_variants_products');
            $table->string('variant_name', 128);
            $table->decimal('variant_price', 13, 3);
            $table->integer('variant_quantity');
            $table->string('variant_img_url', 128);

            $table->unique(['variant_id', 'product_id'], 'idx_product_variants_variant_id_product_id');
            $table->primary(['variant_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
