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
        Schema::create('alquiler_detalles', function (Blueprint $table) {
            $table->id(); // Define 'idAlquilerDetalle' como clave primaria autoincrementable
            $table->foreignId('idAlquiler')->constrained('alquileres'); // Clave foránea referenciando a la tabla 'alquiler'
            $table->foreignId('idTraje')->constrained('trajes'); // Clave foránea referenciando a la tabla 'traje'
            $table->foreignId('idUsuario')->constrained('users'); // Clave foránea referenciando a la tabla 'users' (convención de Laravel para usuarios)
            $table->decimal('precioAlquiler', 8, 2);
            $table->integer('cantidad');
            $table->timestamps(); // Para las columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquiler_detalles');
    }
};
