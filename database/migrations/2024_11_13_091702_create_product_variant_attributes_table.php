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
        Schema::create('product_variant_attributes', function (Blueprint $table) {
            $table->integer('attribute_id', true);
            $table->integer('product_id')->index('fk_product_variant_attributes_products');
            $table->string('attribute_name', 64);

            $table->unique(['attribute_id', 'product_id'], 'idx_product_variant_attributes_attribute_id_product_id');
            $table->primary(['attribute_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variant_attributes');
    }
};
