<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlquilerDetalle extends Model
{
    use HasFactory;

    protected $table = 'AlquilerDetalle'; // Especifica el nombre de la tabla
    protected $primaryKey = 'idAlquilerDetalle'; // Define la clave primaria si no es 'id'

    protected $fillable = [
        'idAlquiler',
        'idTraje',
        'idUsuario',
        'precioAlquiler',
        'cantidad',
    ];

    // Relación con Alquiler (un detalle de alquiler pertenece a un alquiler)
    public function alquiler()
    {
        return $this->belongsTo(Alquiler::class, 'idAlquiler'); // 'idAlquiler' es la clave foránea
    }

    // Relación con Traje (un detalle de alquiler pertenece a un traje)
    public function traje()
    {
        return $this->belongsTo(Traje::class, 'idTraje'); // 'idTraje' es la clave foránea
    }

    // Relación con Usuario (quien agregó el traje al detalle del alquiler)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario'); // 'idUsuario' es la clave foránea
    }
}