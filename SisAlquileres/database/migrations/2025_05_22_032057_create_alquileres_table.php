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
            $table->foreignId('idCliente')->constrained('clientes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('idUser')->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->enum('TipoAlquiler', ['reserva','directo'])->nullable();
            $table->date('fechaAlquiler')->required();
            $table->date('fechaReserva')->nullable();
            $table->date('fechaDevolucion')->nullable();
            $table->decimal('MontoAdelantado', 10, 2)->default(0.00);
            $table->decimal('totalAlquiler', 10, 2)->default(0.00);
            $table->timestamps();
            $table->softDeletes();
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
