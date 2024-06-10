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
        Schema::create('persuratan_templates', function (Blueprint $table) {
            $table->id('persuratan_template_id');
            $table->string('nama_dokumen');
            $table->string('jenis_surat');
            $table->string('file_path');
            $table->boolean('is_archived', 5)->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persuratan_templates');
    }
};

    