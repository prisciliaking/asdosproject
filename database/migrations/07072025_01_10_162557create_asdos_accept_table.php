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
        Schema::create('asdos_accept', function (Blueprint $table) {
            $table->id('accept_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->foreignId('kelas_id')->constrained('kelas_mata_kuliahs', 'kelas_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_asdos_accept');
    }
};
