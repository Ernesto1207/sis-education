<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Justificaciones extends Model
{
    use HasFactory;

    protected $fillable = ['alumno_id', 'profesor_id', 'descripcion','imagen'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }

    public function profesores()
    {
        return $this->belongsTo(profesores::class, 'profesor_id');
    }
}
