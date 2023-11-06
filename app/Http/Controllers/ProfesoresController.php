<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\profesores;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $profesores = profesores::with('user')->oldest()->paginate(10);
        return view('dashboard.profesores', compact('profesores'));
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
            'dni' => 'required|unique:profesores',
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'genero' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'estado' => 'required',
        ]);

        profesores::create([
            'user_id' => $request->input('user_id'),
            'dni' => $request->input('dni'),
            'nombres' => $request->input('nombres'),
            'apellido_paterno' => $request->input('apellido_paterno'),
            'apellido_materno' => $request->input('apellido_materno'),
            'genero' => $request->input('genero'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'ciudad' => $request->input('ciudad'),
            'direccion' => $request->input('direccion'),
            'estado' => $request->input('estado'),
        ]);
        return redirect()->route('profesores.index')->with('success', 'Alumno creado exitosamente.');
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
        $profesores = profesores::find($id);

        if (!$profesores) {
            return redirect()->route('profesores.index');
        }
        return view('dashboard.editprofesores', compact('profesores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $profesores = profesores::find($id);

        $profesores->update($request->all());
        return redirect()->route('profesores.index')->with('success', 'Profesor Editado Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $profesores = profesores::find($id);
        $profesores->delete();
        return redirect()->route('profesores.index')->with('delete', 'Alumnos Eliminado Exitosamente!');
    }
}
