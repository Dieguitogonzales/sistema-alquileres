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
        //douglas estuvo aqui
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('email')->unique();
            $table->string('ci')->unique();
            $table->enum('estado', ['activo', 'inactivo', 'pendiente'])->default('activo');
            $table->string('direccion');
            $table->date('fecha_nacimiento'); // Corrección: nombre de la columna
            $table->string('genero'); // Mejor nombre
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};