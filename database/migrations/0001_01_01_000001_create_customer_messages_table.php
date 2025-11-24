<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('customer_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // pengirim terdaftar
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->text('reply')->nullable();
            $table->enum('status', ['Belum', 'Sudah'])->default('Belum');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_messages');
    }
};
