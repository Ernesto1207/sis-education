<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alumno;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $alumnos = Alumno::with('user')->oldest()->paginate(10);
        return view('dashboard.alumnos', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $request->validate([
            'dni' => 'required|unique:alumnos',
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'estado' => 'required',
        ]);
        Alumno::create([
            'user_id' => $request->input('user_id'),
            'dni' => $request->input('dni'),
            'nombres' => $request->input('nombres'),
            'apellido_paterno' => $request->input('apellido_paterno'),
            'apellido_materno' => $request->input('apellido_materno'),
            'genero' => $request->input('genero'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'ciudad' => $request->input('ciudad'),
            'direccion' => $request->input('direccion'),
            'estado' => $request->input('estado'),
        ]);
        // dd($request->all());
        return redirect()->route('alumnos.index')->with('success', 'Alumno creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $alumno = Alumno::with('cursos')->find($id);

        if (!$alumno) {
            return redirect()->back()->with('error', 'El alumno no existe.');
        }

        $notas = $alumno->notas;
        
        $cursos = $alumno->cursos;

        return view('dashboard.show', compact('alumno', 'cursos', 'notas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // dd($id);
        $alumno = Alumno::find($id);

        if (!$alumno) {
            return redirect()->route('alumnos.index');
        }
        return view('dashboard.editAlumno', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $alumno = Alumno::find($id);

        $alumno->update($request->all());
        return redirect()->route('alumnos.index')->with('success', 'Alumnos Editado Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $alumno = Alumno::find($id);
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('delete', 'Alumnos Eliminado Exitosamente!');
    }
}
