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
        Schema::create('registrasi_asdos', function (Blueprint $table) {
            $table->id('registrasi_id');

            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->foreignId('matkul_id')->constrained('mata_kuliahs', 'matkul_id');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_registrasi_asdos');
    }
};
