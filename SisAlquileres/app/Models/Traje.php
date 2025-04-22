<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traje extends Model
{
    use HasFactory;

    protected $table = 'traje'; // Especifica el nombre de la tabla

    protected $fillable = [
        'idCategoria',
        'cantidad',
        'fecha_creacion',
        'fecha_actualizacion',
    ];

    // Relación con Categoria (un traje pertenece a una categoría)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria'); // 'idCategoria' es la clave foránea en la tabla 'traje'
    }

    // Relación con Alquileres (un traje está en muchos alquileres a través de alquilerDetalle)
    public function alquileres()
    {
        return $this->belongsToMany(Alquiler::class, 'alquilerDetalle', 'idTraje', 'idAlquiler')
                    ->withPivot('precioAlquiler', 'cantidad', 'idUsuario') // Columnas adicionales en la tabla pivote
                    ->withTimestamps(); // Para las columnas created_at y updated_at de la tabla pivote
    }

    // Relación con AlquilerDetalles (un traje tiene muchos detalles de alquiler)
    public function detallesAlquiler()
    {
        return $this->hasMany(AlquilerDetalle::class, 'idTraje'); // 'idTraje' es la clave foránea en 'alquilerDetalle'
    }
}