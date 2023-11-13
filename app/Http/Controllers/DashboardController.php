<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use App\Models\alumno;
use App\Models\Asistencia;
use App\Models\profesores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alumnos = alumno::count();
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


        //  dd($asistenciasCount);


        return view('dashboard', compact('alumnos', 'profesores', 'cursos', 'datos', 'asistenciasCount'));
    }
}
