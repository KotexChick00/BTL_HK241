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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('product_id', true);
            $table->string('product_name', 64);
            $table->integer('in_stock');
            $table->decimal('product_price', 13, 3);
            $table->integer('seller_uid')->index('fk_products_seller_uid');
            $table->integer('belong_to_category_id')->index('fk_products_belong_to_category_id');
            $table->text('product_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
