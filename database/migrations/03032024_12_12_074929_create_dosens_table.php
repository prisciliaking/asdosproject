<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id('dosen_id');
            $table->string('dosen_name', 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
