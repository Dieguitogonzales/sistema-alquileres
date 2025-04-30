<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alquiler extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'alquileres';

    protected $fillable = [
        'idCliente',
        'idUser',
        'idTraje',
        'TipoAlquiler',
        'fechaAlquiler',
        'fechaReserva',
        'fechaDevolucion',
        'MontoAdelantado',
        'cantidad',
        'totalAlquiler'
    ];

    protected $casts = [
        'TipoAlquiler' => 'string',
        'fechaAlquiler' => 'date:Y-m-d',
        'fechaReserva' => 'date:Y-m-d',
        'fechaDevolucion' => 'date:Y-m-d',
        'MontoAdelantado' => 'decimal:2',
        'cantidad' => 'integer',
        'totalAlquiler' => 'decimal:2'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function trajes()
    {
        return $this->belongsTo(Traje::class, 'idTraje');
    }

    

    public function scopeReserva($query)
    {
        return $query->where('TipoAlquiler', 'reserva');
    }

    public function scopeDirecto($query)
    {
        return $query->where('TipoAlquiler', 'directo');
    }

    public function getFechaAlquilerAttribute($value)
    {
        return $value ? date('d/m/Y', strtotime($value)) : null;
    }

    public function setFechaAlquilerAttribute($value)
    {
        $this->attributes['fechaAlquiler'] = $value ? date('Y-m-d', strtotime($value)) : null;
    }
}