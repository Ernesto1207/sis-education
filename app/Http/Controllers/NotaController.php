<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\alumno;
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

        // Crea una nueva instancia de Nota
        $nota = new Nota();
        $nota->alumno_id = $alumno->id;
        $nota->curso_id = $cursoId;
        $nota->valor = $request->valor;
        $nota->save();
        
        // dd($request->all());
        return view('dashboard.nota');
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

        $nombre = $alumno->dni;
        $nombre = $alumno->nombres;
        $cursos = Curso::all();

        return view('dashboard.asignar-notas', compact('dni', 'nombre', 'cursos'));
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
