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
        Schema::create('guardados', function (Blueprint $table) {
            $table->id('id_save');
            $table->string('username');
            $table->unsignedBigInteger('id_post');

            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
            $table->foreign('id_post')->references('id_post')->on('publicaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardados');
    }
};
