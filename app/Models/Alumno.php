<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';

    protected $fillable = [
        'user_id',
        'dni',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'genero',
        'fecha_nacimiento',
        'ciudad',
        'direccion',
        'estado',
        'grado',
        'seccion'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'alumno_id');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'asignaciones_curso', 'alumno_id', 'curso_id')
            ->withPivot('horario');
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

    public function asignaciones_curso()
    {
        return $this->hasMany(AsignacionesCurso::class, 'alumno_id');
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }
}
