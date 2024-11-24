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
        Schema::table('voucher_application', function (Blueprint $table) {
            $table->foreign(['order_id'], 'fk_voucher_application_orders')->references(['order_id'])->on('orders')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['voucher_code'], 'fk_voucher_application_vouchers')->references(['voucher_code'])->on('vouchers')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('voucher_application', function (Blueprint $table) {
            $table->dropForeign('fk_voucher_application_orders');
            $table->dropForeign('fk_voucher_application_vouchers');
        });
    }
};
