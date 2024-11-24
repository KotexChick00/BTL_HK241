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
        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['belong_to_category_id'], 'fk_products_belong_to_category_id')->references(['category_id'])->on('categories')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['seller_uid'], 'fk_products_seller_uid')->references(['user_uid'])->on('users')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('fk_products_belong_to_category_id');
            $table->dropForeign('fk_products_seller_uid');
        });
    }
};
