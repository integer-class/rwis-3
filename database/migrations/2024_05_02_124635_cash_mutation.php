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
        Schema::create('cash_mutation', function (Blueprint $table) {
            $table->id('cash_mutation_id');
            $table->string('cash_mutation_code', 20)->unique();
            $table->unsignedBigInteger('account_debit_id')->index();
            $table->double('debit');
            $table->unsignedBigInteger('account_credit_id')->index();
            $table->double('credit');
            $table->string('description', 100);
            $table->boolean('is_archived', 5)->default(false);
            $table->timestamps();

            $table->foreign('account_debit_id')->references('account_id')->on('account');
            $table->foreign('account_credit_id')->references('account_id')->on('account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_mutation');
    }
};
