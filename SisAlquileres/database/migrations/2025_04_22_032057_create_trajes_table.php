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
        Schema::create('trajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idCategoria')->constrained('categorias'); // Clave foránea referenciando a la tabla 'categoria'
            $table->integer('cantidad');
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_actualizacion')->nullable();
            $table->timestamps(); // Esto creará las columnas 'created_at' y 'updated_at' si no quieres las personalizadas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajes');
    }
};
