<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id(); // primary key
            $table->string('nama');
            $table->string('npm')->unique();
            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
