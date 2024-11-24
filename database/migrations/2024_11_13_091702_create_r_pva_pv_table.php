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
        Schema::create('r_pva_pv', function (Blueprint $table) {
            $table->integer('attribute_id');
            $table->integer('variant_id');
            $table->integer('product_id');
            $table->string('value', 64);

            $table->index(['variant_id', 'product_id'], 'fk_r_pva_pv_product_variants');
            $table->primary(['attribute_id', 'product_id', 'variant_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_pva_pv');
    }
};
