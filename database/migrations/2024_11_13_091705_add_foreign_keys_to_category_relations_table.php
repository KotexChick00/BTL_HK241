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
        Schema::table('category_relations', function (Blueprint $table) {
            $table->foreign(['child_category_id'], 'fk_child_category_relations_categories')->references(['category_id'])->on('categories')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['parent_category_id'], 'fk_parent_category_relations_categories')->references(['category_id'])->on('categories')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_relations', function (Blueprint $table) {
            $table->dropForeign('fk_child_category_relations_categories');
            $table->dropForeign('fk_parent_category_relations_categories');
            $table->dropIndex('fk_child_category_relations_categories');
            $table->dropIndex('fk_parent_category_relations_categories');
        });
    }
};
