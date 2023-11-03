<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\Conducta;
use App\Models\profesores;
use Illuminate\Http\Request;

class ConductaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $conductas = Conducta::with('user')->oldest()->paginate(10);
        $conductas = Conducta::all();
        $alumnos = alumno::all();
        $profesores = profesores::all();
        return view('dashboard.conducta', compact('conductas','alumnos', 'profesores'));
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
        ]);
        Conducta::create($request->all());

        return redirect()->route('conducta.index')->with('success', 'Parte de Conducta registrada exitosamente.');
        // dd($request->all());
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
        //dd($id);
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $conducta = Conducta::find($id);

        $conducta->update($request->all());
        return redirect()->route('conducta.index')->with('success', 'Parte de Conducta registrada exitosamente.');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $conducta = Conducta::find($id);
        $conducta->delete();
        return redirect()->route('conducta.index')->with('delete', 'Alumnos Eliminado Exitosamente!');
    }
}
