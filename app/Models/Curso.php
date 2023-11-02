<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'horario_entrada',
        'horario_salida',
        'dias_semana',
    ];

    public function profesores()
    {
        return $this->belongsToMany(profesores::class, 'curso_profesor', 'curso_id', 'profesor_id');
    }   

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'asignaciones_curso', 'curso_id', 'alumno_id')
            ->withPivot('horario');
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
