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
        Schema::table('household', function (Blueprint $table) {
            $table->unsignedBigInteger('resident_id')->index()->nullable()->unique();
            $table->foreign('resident_id')->references('resident_id')->on('resident');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('household', function (Blueprint $table) {
            $table->dropForeign(['resident_id']);
        });
    }
};
