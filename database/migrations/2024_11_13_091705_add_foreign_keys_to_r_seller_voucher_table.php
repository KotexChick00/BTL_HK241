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
        Schema::table('r_seller_voucher', function (Blueprint $table) {
            $table->foreign(['seller_uid'], 'fk_r_seller_voucher_users')->references(['user_uid'])->on('users')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['voucher_code'], 'fk_r_seller_voucher_vouchers')->references(['voucher_code'])->on('vouchers')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('r_seller_voucher', function (Blueprint $table) {
            $table->dropForeign('fk_r_seller_voucher_users');
            $table->dropForeign('fk_r_seller_voucher_vouchers');
        });
    }
};
