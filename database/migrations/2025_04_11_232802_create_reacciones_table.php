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
        Schema::create('reacciones', function (Blueprint $table) {
            $table->id('id_react');
            $table->string('username');
            $table->unsignedBigInteger('id_comm');
            $table->char('act', 1); // 0–5

            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            $table->foreign('id_comm')->references('id_comm')->on('comentarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reacciones');
    }
};
