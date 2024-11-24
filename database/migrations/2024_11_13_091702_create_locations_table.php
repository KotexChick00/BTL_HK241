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
        Schema::create('locations', function (Blueprint $table) {
            $table->integer('location_id', true);
            $table->boolean('is_default')->default(false);
            $table->string('state', 64);
            $table->string('city', 64);
            $table->string('town', 64);
            $table->string('address', 256);
            $table->integer('user_uid')->index('fk_locations_user_uid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
