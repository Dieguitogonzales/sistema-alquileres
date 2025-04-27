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
            $table->id();
            $table->foreignId('idAlquiler')->constrained('alquileres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('idTraje')->constrained('trajes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('idUsuario')->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->decimal('precioAlquiler', 8, 2)->default(0.00);
            $table->integer('cantidad')->unsigned()->default(1);
            $table->timestamps();
            $table->softDeletes();
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
