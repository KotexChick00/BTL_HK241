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
        Schema::table('legit_attributes', function (Blueprint $table) {
            $table->foreign(['attribute_id'], 'fk_legit_attributes_pv_attributes')->references(['attribute_id'])->on('product_variant_attributes')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('legit_attributes', function (Blueprint $table) {
            $table->dropForeign('fk_legit_attributes_pv_attributes');
            $table->dropIndex('fk_legit_attributes_pv_attributes');
        });
    }
};
