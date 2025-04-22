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
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idCliente')->constrained('clientes'); // Clave foránea referenciando a la tabla 'cliente'
            $table->foreignId('idUser')->constrained('users'); // Clave foránea referenciando a la tabla 'users'
            $table->date('fechaAlquiler');
            $table->date('fechaReserva')->nullable();
            $table->date('fechaDevolucion')->nullable();
            $table->decimal('totalAlquiler', 10, 2)->nullable();
            $table->decimal('MontoAdelantado', 10, 2)->nullable();
            $table->string('TipoAlquiler')->nullable();
            $table->timestamps(); // Para las columnas 'created_at' y 'upda
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquileres');
    }
};
