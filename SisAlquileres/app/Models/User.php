<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellidoP',
        'apellidoM',
        'email',
        'ci',
        'estado',
        'direccion',
        'fecha_nacimiento',
        'genero',
        'fecha_modificacion',
        'password', // Asegúrate de no incluir la contraseña en fillable si no quieres asignarla masivamente sin hash
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'fecha_nacimiento' => 'date',
        'fecha_modificacion' => 'datetime',
    ];

    // Relación con Alquileres (un usuario tiene muchos alquileres)
    public function alquileres()
    {
        return $this->hasMany(Alquiler::class, 'user_id'); // 'user_id' es la clave foránea en la tabla 'alquiler'
    }

    // Relación con AlquilerDetalles (un usuario puede tener muchos registros en alquilerDetalle)
    public function detallesAlquiler()
    {
        return $this->hasMany(AlquilerDetalle::class, 'user_id'); // 'user_id' es la clave foránea en la tabla 'alquilerDetalle'
    }
}