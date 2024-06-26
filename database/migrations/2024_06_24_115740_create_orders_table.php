<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
            $table->foreignId('address_id')->constrained()->onUpdate('cascade');
            $table->foreignId('receive_method_id')->constrained()->onUpdate('cascade');
            $table->foreignId('payment_type_id')->constrained()->onUpdate('cascade');
            $table->foreignId('status_id')->constrained()->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
