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
        Schema::create('resident', function (Blueprint $table) {
            $table->id('resident_id');
            $table->unsignedBigInteger('household_id')->index();
            $table->string('nik', 16)->unique();
            $table->string('full_name', 100);
            $table->string('place_of_birth', 50);
            $table->date('date_of_birth');
            $table->string('gender', 10)->default('Laki-laki');
            $table->string('blood_type', 5);
            $table->string('religion', 20)->default('Islam');
            $table->string('marriage_status', 20)->default('Belum Menikah');
            $table->string('nationality', 5)->default('WNI');
            $table->integer('income');
            $table->string('job', 50);
            $table->string('whatsapp_number', 20);
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
        Schema::dropIfExists('resident');
    }
};
