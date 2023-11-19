<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\Conducta;
use App\Models\profesores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConductaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $conductas = Conducta::all();
        $alumno = alumno::all();
        $profesores = profesores::all();

        $usuario = Auth::user();
        $alumnos = $usuario->alumno;

        if ($alumnos) {
            $alumnoId = $usuario->alumno->id;
            $conductas = Conducta::where('alumno_id', $alumnoId)->get();
            $profesores = profesores::all();
            // return ($asistencias);
            return view('dashboard.conducta', compact('conductas', 'alumnos', 'profesores'));
        }

        $query = $request->input('search');
        $mensaje = "";

        if ($query) {
            $alumno = Alumno::where('dni', 'like', "%$query%")
                ->orWhere('nombres', 'like', "%$query%")
                ->get();
            if ($alumno->isNotEmpty()) {
                $alumnoIds = $alumno->pluck('id')->toArray();
                // Si se encuentra el alumno, busca en la tabla de asistencias utilizando el alumno_id
                $conductas = Conducta::whereIn('alumno_id', $alumnoIds)
                    ->get();
            } else {
                // Si no se encuentra ningún alumno, muestra un mensaje
                $mensaje = "No se encontró ningún alumno con ese criterio de búsqueda.";
            }
        } else {
            $conductas = Conducta::all();
        }

        return view('dashboard.conducta', compact('conductas', 'alumno', 'profesores'));
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
