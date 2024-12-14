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
        Schema::create('mata_kuliah_dosens', function (Blueprint $table) {
            $table->id('matkul_dosen_id');

            $table->foreignId('dosen_id')->constrained(
                'dosens',
                'dosen_id'
            );
            $table->foreignId('mata_kuliah_id')->constrained(
                'mata_kuliahs',
                'mata_kuliah_id'
            );
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah_dosens');
    }
};
