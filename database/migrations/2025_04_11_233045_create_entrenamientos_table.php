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
        Schema::create('entrenamientos', function (Blueprint $table) {
            $table->id('id_gym');
            $table->string('username'); // Relación con usuario
            $table->char('type', 1); // Tipo de entrenamiento
            $table->longText('detail'); // JSON string con propiedades (titulo, descripcion, etc.)
            $table->timestamps();

            // Clave foránea hacia users
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrenamientos');
    }
};
