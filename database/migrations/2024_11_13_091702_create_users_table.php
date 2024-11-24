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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('user_uid', true);
            $table->string('login', 32);
            $table->string('password', 50);
            $table->boolean('user_type')->default(false);
            $table->string('full_name', 128);
            $table->string('phone_number', 16);
            $table->string('shop_name', 64)->nullable();
            $table->text('shop_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
