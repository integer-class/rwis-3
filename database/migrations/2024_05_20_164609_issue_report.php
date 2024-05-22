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
        Schema::create('issue_report', function (Blueprint $table) {
            $table->id('issue_report_id');
            $table->unsignedBigInteger('resident_id')->index();
            $table->string('title', 100);
            $table->text('description');
            $table->string('status', 20);
            $table->boolean('is_approved', 5)->default(true);
            $table->boolean('is_archived', 5)->default(false);
            $table->timestamps();

            $table->foreign('resident_id')->references('resident_id')->on('resident');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue_report');
    }
};
