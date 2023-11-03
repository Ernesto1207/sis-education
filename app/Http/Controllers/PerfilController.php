<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use App\Models\alumno;
use App\Models\profesores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    //
    public function show()
    {
        $usuario = Auth::user();
        $alumnos = $usuario->alumno;
        $profesor = $usuario->profesores;


        $profesorId = $usuario->profesores->id;

        $cursosLunes = Curso::where('profesor_id', $profesorId)
            ->where('dias_semana', 'lunes')
            ->select('dias_semana', 'nombre', 'horario_entrada', 'horario_salida')
            ->orderBy('horario_entrada', 'asc')
            ->get();

        $cursosMartes = Curso::where('profesor_id', $profesorId)
            ->where('dias_semana', 'martes')
            ->select('dias_semana', 'nombre', 'horario_entrada', 'horario_salida')
            ->orderBy('horario_entrada', 'asc')
            ->get();
        $cursosMiercoles = Curso::where('profesor_id', $profesorId)
            ->where('dias_semana', 'miercoles')
            ->select('dias_semana', 'nombre', 'horario_entrada', 'horario_salida')
            ->orderBy('horario_entrada', 'asc')
            ->get();
        $cursosJueves = Curso::where('profesor_id', $profesorId)
            ->where('dias_semana', 'jueves')
            ->select('dias_semana', 'nombre', 'horario_entrada', 'horario_salida')
            ->orderBy('horario_entrada', 'asc')
            ->get();
        $cursosViernes = Curso::where('profesor_id', $profesorId)
            ->where('dias_semana', 'viernes')
            ->select('dias_semana', 'nombre', 'horario_entrada', 'horario_salida')
            ->orderBy('horario_entrada', 'asc')
            ->get();
        $cursosSabado = Curso::where('profesor_id', $profesorId)
            ->where('dias_semana', 'sabado')
            ->select('dias_semana', 'nombre', 'horario_entrada', 'horario_salida')
            ->orderBy('horario_entrada', 'asc')
            ->get();

        return view('profile.mostrar', compact(
            'usuario',
            'alumnos',
            'profesor',
            'cursosLunes',
            'cursosMartes',
            'cursosMiercoles',
            'cursosJueves',
            'cursosViernes',
            'cursosSabado'
        ));
    }
}
