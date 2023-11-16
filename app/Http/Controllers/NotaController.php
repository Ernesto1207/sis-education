<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\alumno;
use App\Models\AsignacionesCurso;
use App\Models\Curso;
use App\Models\Nota;


class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.nota');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return ('hola mundo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'dni' => 'required|numeric|digits:8',
            'curso_id' => 'required|exists:cursos,id',
            'valor' => 'required|numeric|min:0|max:20',
        ]);

        // Busca al alumno por DNI
        $alumno = Alumno::where('dni', $request->dni)->first();

        if (!$alumno) {
            return redirect()->back()->with('error', 'El alumno no existe');
        }

        // Obtiene el ID del curso a partir de la solicitud
        $cursoId = $request->curso_id;

        // Verifica si el alumno está asignado al curso
        $asignacionCurso = AsignacionesCurso::where('alumno_id', $alumno->id)
            ->where('curso_id', $cursoId)
            ->first();

        if (!$asignacionCurso) {
            return redirect()->back()->with('error', 'El alumno no está asignado a este curso.');
        }

        // Verifica si el alumno ya tiene 4 notas en este curso
        $notasCurso = $alumno->notas()->where('curso_id', $cursoId)->count();

        if ($notasCurso >= 4) {
            return redirect()->back()->with('error', 'Este alumno ya tiene 4 notas en este curso.');
        } 
        
        // Crea una nueva instancia de Nota
        $nota = new Nota();
        $nota->alumno_id = $alumno->id;
        $nota->curso_id = $cursoId;
        $nota->valor = $request->valor;
        $nota->save();

        // dd($request->all());
        return redirect()->route('Notas.index')->with('success', 'Nota registrada exitosamente.');
    }

    public function validarDNI(Request $request)
    {
        $request->validate([
            'dni' => 'required|numeric|digits:8',
        ]);
        $dni = $request->input('dni');

        $alumno = Alumno::where('dni', $dni)->first();
        if (!$alumno) {
            return redirect()->back()->with('error', 'El alumno no existe');
        }

        $dni = $alumno->dni;
        $nombre = $alumno->nombres;
        $apellidoM = $alumno->apellido_materno;
        $apellidoP = $alumno->apellido_paterno;
        // $cursos = Curso::all();
        $cursosDelAlumno = $alumno->cursos;

        return view('dashboard.asignar-notas', compact('dni', 'nombre', 'apellidoP', 'apellidoM', 'cursosDelAlumno'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
