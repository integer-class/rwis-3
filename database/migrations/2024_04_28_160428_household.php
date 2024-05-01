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
        Schema::create('household', function (Blueprint $table) {
            $table->id('household_id');
            $table->string('number_kk', 16)->unique();
            $table->string('address', 100);
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('sub_district', 50);
            $table->string('district', 50);
            $table->string('city', 50);
            $table->string('province', 50);
            $table->string('postal_code', 10);
            $table->integer('area');
            $table->boolean('is_archived')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('household');
    }
};
