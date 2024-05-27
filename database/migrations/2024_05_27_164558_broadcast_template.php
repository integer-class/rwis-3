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
        Schema::create('broadcast_template', function (Blueprint $table) {
            $table->id('broadcast_template_id');
            $table->string('text');
            $table->json('fillable_fields');
            $table->string('type');
            $table->boolean('is_archived', 5)->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broadcast_template');
    }
};
