<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    
    protected $fillable = ['curso_id', 'alumno_id', 'valor'];


    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'asignaciones_curso',  'alumno_id');
    }
}
