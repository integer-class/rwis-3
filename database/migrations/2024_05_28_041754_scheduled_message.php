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
        Schema::create('scheduled_message', function (Blueprint $table) {
            $table->id('scheduled_message_id');
            $table->unsignedBigInteger('broadcast_template_id')->index();
            $table->unsignedBigInteger('sender_id')->index();
            $table->unsignedBigInteger('receiver_id')->index();
            $table->json('fields_values');
            $table->boolean('is_archived', 5)->default(false);
            $table->timestamps();

            $table->foreign('broadcast_template_id')->references('broadcast_template_id')->on('broadcast_template');
            $table->foreign('receiver_id')->references('resident_id')->on('resident');
            $table->foreign('sender_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduled_message');
    }
};
