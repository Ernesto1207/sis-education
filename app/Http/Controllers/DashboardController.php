<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use App\Models\alumno;
use App\Models\Asistencia;
use App\Models\profesores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alumno = alumno::count();
        $profesores = profesores::count();
        $cursos = Curso::count();


        $datos = DB::table('alumnos')
            ->select(DB::raw('MONTH(created_at) as mes'), DB::raw('COUNT(*) as cantidad'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('cantidad', 'mes');


        $asistencias = Asistencia::all();

        // Procesa los datos para contar asistencias, tardanzas y faltas
        $asistenciasCount = [
            'Asistio' => $asistencias->where('estado', 'Asistio')->count(),
            'tardanzas' => $asistencias->where('estado', 'Tardanza')->count(),
            'faltas' => $asistencias->where('estado', 'Falta')->count(),
        ];

        $usuario = Auth::user();
        $alumnos = $usuario->alumno;
        
        $profesor = $usuario->profesores;

        if ($profesor) {
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
            return view('dashboard', compact(
                'usuario',
                'alumnos',
                'profesor',
                'cursosLunes',
                'cursosMartes',
                'cursosMiercoles',
                'cursosJueves',
                'cursosViernes',
                'cursosSabado',
                'datos',
                'asistenciasCount',
            ));
        }
        if ($alumnos) {

            $alumnoId = $usuario->alumno->id;
            $alumno = Alumno::with('cursos')->find($alumnoId);
            $dia1 = 'lunes';
            $dia2 = 'martes';
            $dia3 = 'miercoles';
            $dia4 = 'jueves';
            $dia5 = 'viernes';
            $dia6 = 'sabado';


            $cursosLunes = $alumno->cursos
                ->filter(function ($curso) use ($dia1) {
                    return $curso->dias_semana === $dia1;
                })
                ->sortBy('horario_entrada');

            $cursosMartes = $alumno->cursos
                ->filter(function ($curso) use ($dia2) {
                    return $curso->dias_semana === $dia2;
                })
                ->sortBy('horario_entrada');

            $cursosMiercoles = $alumno->cursos
                ->filter(function ($curso) use ($dia3) {
                    return $curso->dias_semana === $dia3;
                })->sortBy('horario_entrada');

            $cursosJueves = $alumno->cursos
                ->filter(function ($curso) use ($dia4) {
                    return $curso->dias_semana === $dia4;
                })->sortBy('horario_entrada');

            $cursosViernes = $alumno->cursos
                ->filter(function ($curso) use ($dia5) {
                    return $curso->dias_semana === $dia5;
                })->sortBy('horario_entrada');

            $cursosSabado = $alumno->cursos
                ->filter(function ($curso) use ($dia6) {
                    return $curso->dias_semana === $dia6;
                })->sortBy('horario_entrada');

            $notas = $alumno->notas;
            return view('dashboard', compact(
                'usuario',
                'alumnos',
                'profesor',
                'alumnoId',
                'cursosLunes',
                'cursosMartes',
                'cursosMiercoles',
                'cursosJueves',
                'cursosViernes',
                'cursosSabado',
                'datos',
                'asistenciasCount',
                'notas'

            ));
        }

        return view('dashboard', compact('alumnos', 'alumno', 'profesores', 'cursos', 'datos', 'asistenciasCount'));
    }
}
