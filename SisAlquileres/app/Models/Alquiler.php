<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;

    protected $table = 'alquileres'; // Especifica el nombre de la tabla si no sigue la convención

    protected $fillable = [
        'idCliente',
        'idUser',
        'fechaAlquiler',
        'fechaReserva',
        'fechaDevolucion',
        'totalAlquiler',
        'MontoAdelantado',
        'TipoAlquiler',
    ];

    // Relación con Cliente (un alquiler pertenece a un cliente)
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente'); // 'idCliente' es la clave foránea en la tabla 'alquiler'
    }

    // Relación con Usuario (un alquiler fue registrado por un usuario)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUser'); // 'idUsuario' es la clave foránea en la tabla 'alquiler'
    }

    // Relación con Trajes (un alquiler tiene muchos trajes a través de alquilerDetalle)
    public function trajes()
    {
        return $this->belongsToMany(Traje::class, 'alquilerDetalle', 'idAlquiler', 'idTraje')
                    ->withPivot('precioAlquiler', 'cantidad', 'idUser') // Columnas adicionales en la tabla pivote
                    ->withTimestamps(); // Para las columnas created_at y updated_at de la tabla pivote
    }

    // Relación con AlquilerDetalles (un alquiler tiene muchos detalles de alquiler)
    public function detallesAlquiler()
    {
        return $this->hasMany(AlquilerDetalle::class, 'idAlquiler'); // 'idAlquiler' es la clave foránea en 'alquilerDetalle'
    }
}