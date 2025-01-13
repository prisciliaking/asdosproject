<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_name', 100);
            $table->string('user_email', 225)->unique();
            $table->string('user_nim', 100)->unique();
            $table->string('user_password');
            $table->string('image')->nullable();
            $table->foreignId('role_id')->constrained(
            'roles', //table
            'role_id' //id
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
