<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('surname', 32);
            $table->string('name', 32);
            $table->string('email', 64)->unique();
            $table->string('phone', 16)->unique();
            $table->string('password');
            $table->foreignId('role_id')->default(2)->constrained()->onUpdate('cascade');
            $table->rememberToken()->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
