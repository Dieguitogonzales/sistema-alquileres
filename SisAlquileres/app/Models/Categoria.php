<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; // Especifica el nombre de la tabla

    protected $fillable = [
        'nombre',
        'precio',
    ];

    // Relación con Trajes (una categoría tiene muchos trajes)
    public function trajes()
    {
        return $this->hasMany(Traje::class, 'idCategoria'); // 'idCategoria' es la clave foránea en la tabla 'traje'
    }
}