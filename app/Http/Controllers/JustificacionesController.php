<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\profesores;
use Illuminate\Http\Request;
use App\Models\Justificaciones;
use Illuminate\Support\Facades\Auth;

class JustificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $justificaciones = Justificaciones::all();
        $alumnos = alumno::all();
        $profesores = profesores::all();


        $usuario = Auth::user();
        $alumno = $usuario->alumno;

        if ($alumno) {
            $alumnoId = $usuario->alumno->id;
            $justificaciones = Justificaciones::where('alumno_id', $alumnoId)->get();
            $profesores = profesores::all();
            // return ($asistencias);
            return view('dashboard.justificaciones', compact('justificaciones', 'alumno', 'profesores'));
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
                $justificaciones = Justificaciones::whereIn('alumno_id', $alumnoIds)
                    ->get();
            } else {
                // Si no se encuentra ningún alumno, muestra un mensaje
                $mensaje = "No se encontró ningún alumno con ese criterio de búsqueda.";
            }
        } else {
            $justificaciones = Justificaciones::all();
        }

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
