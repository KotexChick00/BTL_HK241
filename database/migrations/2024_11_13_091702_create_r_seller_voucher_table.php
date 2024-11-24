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
        Schema::create('r_seller_voucher', function (Blueprint $table) {
            $table->string('voucher_code', 16)->primary();
            $table->integer('seller_uid')->index('fk_r_seller_voucher_users');
            $table->dateTime('voucher_start_time');
            $table->dateTime('voucher_expire_time');
            $table->integer('global_maximum_use')->default(-1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_seller_voucher');
    }
};
