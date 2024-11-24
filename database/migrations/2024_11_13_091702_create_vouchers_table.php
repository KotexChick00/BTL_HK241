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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->string('voucher_code', 16)->primary();
            $table->string('voucher_name', 64);
            $table->dateTime('voucher_create_time');
            $table->dateTime('voucher_expire_time');
            $table->decimal('voucher_discount', 4);
            $table->decimal('voucher_min_requirement', 13, 3);
            $table->decimal('voucher_max_discount', 13, 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
