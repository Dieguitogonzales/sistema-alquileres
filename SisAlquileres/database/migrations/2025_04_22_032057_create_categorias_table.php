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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); // Asegurar que el nombre de la categoría sea único
            $table->text('descripcion');
            $table->enum('estado', ['activo', 'inactivo', 'pendiente'])->default('activo'); // Precio con 8 dígitos en total y 2 decimales
            $table->timestamps();
            $table->softDeletes();// Para las columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
