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
        Schema::create('mata_kuliah_pilihans', function (Blueprint $table) {
            $table->id('mata_kuliah_pilihan_id');
            $table->enum('pilihan_status', ['approve', 'rejected', 'waiting']);

            $table->foreignId('user_id')->constrained(
                'users',
                'user_id'
            );
            $table->foreignId('mata_kuliah_id')->constrained(
                'mata_kuliahs',
                'mata_kuliah_id'
            );

            // Add a unique constraint to prevent duplicate entries for the same user and mata_kuliah
            $table->unique(['user_id', 'mata_kuliah_id']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah_pilihans');
    }
};
