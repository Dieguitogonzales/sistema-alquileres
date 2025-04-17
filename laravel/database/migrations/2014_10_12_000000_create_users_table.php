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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellidoP');
            $table->string('apellidoM');
            $table->string('email')->unique();
            $table->string('ci')->unique();
            $table->enum('estado', ['activo', 'inactivo', 'pendiente']); // Corrección: se especifican los valores del enum
            $table->string('direccion');
            $table->date('fecha de nacimiento');
            $table->string('genero');
            $table->timestamp('fecha de modificacion')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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