<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\Justificaciones;
use App\Models\profesores;
use Illuminate\Http\Request;

class JustificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $justificaciones = Justificaciones::all();
        $alumnos = alumno::all();
        $profesores = profesores::all();

        return view('dashboard.justificaciones', compact('justificaciones', 'alumnos', 'profesores'));
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
            'alumno_id' => 'required',
            'profesor_id' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagenPath = $request->file('imagen')->store('public/images');

        $imagenUrl = asset('storage/' . str_replace('', '', $imagenPath));

        // dd($request->all());
        Justificaciones::create([
            'alumno_id' => $request->alumno_id, 
            'profesor_id' => $request->profesor_id, 
            'descripcion' => $request->descripcion, 
            'imagen' => $imagenUrl, 
        ]);
        // Justificaciones::create($request->all());

        return redirect()->route('justificaciones.index')->with('success', 'Justificaciones registrada exitosamente.');
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
        $Justificaciones = Justificaciones::find($id);

        $Justificaciones->update($request->all());
        return redirect()->route('justificaciones.index')->with('success', 'Parte de Conducta registrada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $Justificaciones = Justificaciones::find($id);
        $Justificaciones->delete();
        return redirect()->route('justificaciones.index')->with('delete', 'Alumnos Eliminado Exitosamente!');
    }
}
