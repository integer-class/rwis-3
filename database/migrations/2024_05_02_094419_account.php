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
        Schema::create('account', function (Blueprint $table) {
            $table->id('account_id');
            $table->unsignedBigInteger('household_id')->index();
            $table->string('name_account', 100);
            $table->string('number_account', 16)->unique();
            $table->double('balance');
            $table->boolean('is_archived', 5)->default(false);
            $table->timestamps();

            $table->foreign('household_id')->references('household_id')->on('household');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
