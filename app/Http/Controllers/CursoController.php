<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Profesor;
use App\Models\profesores;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cursos = curso::latest()->paginate(5);
        return view('dashboard.cursos', ['cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $profesores = profesores::all();
        return view('dashboard.create-curso', compact('profesores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'profesor_id' => 'required|exists:profesores,id',
            'horario_entrada' => 'required|date_format:H:i', // Validación para el formato de hora
            'horario_salida' => 'required|date_format:H:i',  // Validación para el formato de hora
            'dias_semana' => 'required|string',
        ]);

        $profesorId = $request->input('profesor_id');
        $horarioEntradaNuevo = $request->input('horario_entrada');
        $horarioSalidaNuevo = $request->input('horario_salida');

        $cursoExistente = Curso::where('profesor_id', $profesorId)
            ->where(function ($query) use ($horarioEntradaNuevo, $horarioSalidaNuevo) {
                $query->where(function ($q) use ($horarioEntradaNuevo, $horarioSalidaNuevo) {
                    $q->where('horario_entrada', '<', $horarioSalidaNuevo)
                        ->where('horario_salida', '>', $horarioEntradaNuevo);
                });
            })
            ->first();

        if ($cursoExistente) {
            return redirect()->back()->with('error', 'Los horarios se cruzan con otro curso del mismo profesor.');
        }

        $curso = new Curso();
        $curso->nombre = $request->input('nombre');
        $curso->descripcion = $request->input('descripcion');
        $curso->horario_entrada = $horarioEntradaNuevo;
        $curso->horario_salida = $horarioSalidaNuevo;
        $curso->profesor_id = $profesorId;
        $curso->dias_semana = $request->input('dias_semana');
        $curso->save();


        // Ahora asocia el profesor al curso
        $profesorId = $request->input('profesor_id');
        $curso->profesores()->attach($profesorId);

        return redirect()->route('cursos.index')->with('success', 'Curso Registrado Exitosamente!');
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
    public function edit(curso $curso)
    {
        //
        return view('dashboard.edit-curso', ['curso' => $curso]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, curso $curso)
    {
        //
        $curso->update($request->all());
        return redirect()->route('cursos.index')->with('success', 'Curso Editado Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(curso $curso)
    {
        //
        // Elimina todas las relaciones en la tabla curso_profesor
        $curso->profesores()->detach();

        // Luego, elimina el curso
        $curso->delete();

        return redirect()->route('cursos.index')->with('delete', 'Curso Eliminado Exitosamente!');
    }
}
