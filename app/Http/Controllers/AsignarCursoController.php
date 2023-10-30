<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\Curso;
use App\Models\asignarcurso;
use Illuminate\Http\Request;

class AsignarCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function mostrarFormulario($id)
    {
        $alumno = Alumno::find($id);

        if (!$alumno) {
            // El alumno no existe, puedes manejar esto aquí
            return redirect()->back()->with('error', 'El alumno no existe.');
        }

        // Ahora puedes acceder a las propiedades del alumno de forma segura
        $alumnoId = $alumno->id;
        $nombre = $alumno->nombre;
        $apellido = $alumno->apellido;

        $cursos = Curso::all();
        return view('dashboard.asignar_curso', compact('alumno', 'cursos'));
    }

    public function asignarCurso(Request $request)
    {
        // Valida y guarda la asignación en la base de datos
        $request->validate([
            'alumno_id' => 'required',
            'curso_id' => 'required',
            'horario' => 'required',
        ]);

        $alumno = Alumno::find($request->input('alumno_id'));
        $curso = Curso::find($request->input('curso_id'));
        $horario = $request->input('horario');

        // Asignar el curso al alumno con el horario
        $alumno->cursos()->attach($curso, ['horario' => $horario]);

        return redirect()->route('alumnos.show', ['alumno' => $alumno->id])->with('success', 'Curso asignado exitosamente.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
