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
            $table->foreignId('idCategoria')->constrained('categorias')
                ->onDelete('cascade')// Clave foránea referenciando a la tabla 'categoria'
                ->onUpdate('cascade');
            $table->string('nombre', 255); 
            $table->unsignedInteger('cantidad')->default(0);
            $table->decimal('precio', 8, 2)->default(0.00);
            $table->enum('estado', ['activo', 'inactivo', 'pendiente']);
            $table->timestamps();
            $table->softDeletes(); // Esto creará las columnas 'created_at' y 'updated_at' si no quieres las personalizadas
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
