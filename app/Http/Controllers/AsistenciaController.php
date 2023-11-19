<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\alumno;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $alumnos = $usuario->alumno;


        $query = $request->input('search');
        $mensaje = "";
        //uso de input search
        if ($query) {
            // Si se proporciona una consulta de búsqueda
            $alumno = Alumno::where('dni', 'like', "%$query%")
                ->orWhere('nombres', 'like', "%$query%")
                ->get();

            if ($alumno->isNotEmpty()) {
                $alumnoIds = $alumno->pluck('id')->toArray();
                // Si se encuentra el alumno, busca en la tabla de asistencias utilizando el alumno_id
                $asistencias = Asistencia::whereIn('alumno_id', $alumnoIds)
                    ->get();
            } else {
                // Si no se encuentra ningún alumno, muestra un mensaje
                $mensaje = "No se encontró ningún alumno con ese criterio de búsqueda.";
            }
        } else {
            // Si no se proporciona una consulta de búsqueda, muestra todas las asistencias
            $asistencias = Asistencia::all();
        }


        // Verifica si el usuario tiene un rol de alumno
        if ($alumnos) {
            $alumnoId = $usuario->alumno->id;
            $asistencias = Asistencia::where('alumno_id', $alumnoId)->get();
            // return ($asistencias);
            return view('dashboard.asistencia', compact('asistencias'));
        }

        // Si el usuario no es un alumno, muestra todas las asistencias
        $asistencias = Asistencia::all();
        return view('dashboard.asistencia', compact('asistencias'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.registerAsistencia');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|numeric|digits:8',
        ]);

        $dni = strtoupper($request->input('dni'));
        $fecha_actual = now()->toDateString(); // Obtiene la fecha actual en formato Y-m-d

        // Buscar al alumno por DNI
        $alumno = Alumno::where('dni', $dni)->first();

        if (!$alumno) {
            return redirect()->back()->with('error', 'El alumno no existe');
        }

        // Buscar si ya hay una asistencia registrada para el alumno en la fecha actual
        $asistenciaExistente = Asistencia::where('alumno_id', $alumno->id)
            ->whereDate('fecha', $fecha_actual)
            ->first();

        if ($asistenciaExistente) {
            return redirect()->back()->with('error', 'Ya se registró asistencia para este alumno hoy');
        }

        // Calcular la hora actual
        $hora_actual = now();

        // Definir las horas límite para determinar el estado
        $hora_inicio_tardanza = now()->setHour(8)->setMinute(0)->setSecond(0);
        $hora_inicio_falta = now()->setHour(9)->setMinute(0)->setSecond(0);

        // Determinar el estado en función de la hora actual
        $estado = 'Asistio'; // Valor predeterminado

        if ($hora_actual > $hora_inicio_tardanza) {
            $estado = 'Tardanza';
        }

        if ($hora_actual > $hora_inicio_falta) {
            $estado = 'Falta';
        }

        // Registrar la asistencia con el estado y la hora de entrada
        Asistencia::create([
            'alumno_id' => $alumno->id,
            'estado' => $estado,
            'fecha' => $fecha_actual, // Usar la fecha actual
        ]);

        return redirect()->back()->with('success', 'Asistencia registrada para ' . $alumno->nombres);
    }
}
