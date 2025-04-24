<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Especifica el nombre de la tabla

    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'telefono',
        'ciCliente',
    ];

    // Relación con Alquileres (un cliente tiene muchos alquileres)
    public function alquileres()
    {
        return $this->hasMany(Alquiler::class, 'idCliente'); // 'idCliente' es la clave foránea en la tabla 'alquiler'
    }
}