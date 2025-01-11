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
        Schema::create('kelas_mata_kuliahs', function (Blueprint $table) {
            $table->id('kelas_id');
            $table->string('kelas_name');
            $table->string('mata_kuliah_hari');
            $table->time('mata_kuliah_jam');
            $table->string('whats_app_link')->nullable();
            $table->integer('kelas_semester');

            $table->foreignId('dosen_id')->constrained('dosens', 'dosen_id');
            $table->foreignId('matkul_id')->constrained('mata_kuliahs', 'matkul_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_mata_kuliahs');
    }
};
