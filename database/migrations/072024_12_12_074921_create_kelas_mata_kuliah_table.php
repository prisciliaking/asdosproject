<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kelas_mata_kuliahs', function (Blueprint $table) {
            $table->id('kelas_id');
            $table->string('kelas_nama', 100);
            $table->string('mata_kuliah_hari', 100);
            $table->string('mata_kuliah_jam', 100);
            $table->string('whats_app_link', 225)->nullable();

            $table->enum('kelas_semester', ['ganjil', 'genap']);

            $table->boolean('is_deleted')->default(false);


            $table->foreignId('matkul_dosen_id')->constrained(
                 'mata_kuliah_dosens',
                'matkul_dosen_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas_mata_kuliah');
    }
};
