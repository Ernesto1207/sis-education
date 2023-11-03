<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesores extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dni',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'genero',
        'email',
        'telefono',
        'fecha_nacimiento',
        'ciudad',
        'direccion',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }
}
