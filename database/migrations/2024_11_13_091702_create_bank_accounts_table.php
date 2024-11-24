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
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->integer('bank_account_id', true);
            $table->integer('holder_uid')->index('fk_bank_accounts_users');
            $table->string('account_number', 32);
            $table->string('bank_name', 64);
            $table->string('branch_name', 64);
            $table->string('holder_name', 128);
            $table->boolean('is_default')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
