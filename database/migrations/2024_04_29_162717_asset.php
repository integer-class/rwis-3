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
        Schema::create('asset', function (Blueprint $table) {
            $table->id('asset_id');
            $table->unsignedBigInteger('household_id')->index();
            $table->string('name', 100);
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
        Schema::dropIfExists('asset');
    }
};
