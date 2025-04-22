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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // Clave primaria 'id' autoincremental
            $table->string('nombre', 255);
            $table->string('apellidoP', 255)->nullable();
            $table->string('apellidoM', 255)->nullable();
            $table->string('telefono')->nullable(); // Cambiado a string
            $table->string('ciCliente')->unique(); // Cambiado a string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
