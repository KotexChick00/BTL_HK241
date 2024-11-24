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
        Schema::create('legit_attributes', function (Blueprint $table) {
            $table->integer('attribute_id');
            $table->boolean('is_legit');

            $table->primary(['attribute_id', 'is_legit']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legit_attributes');
    }
};
