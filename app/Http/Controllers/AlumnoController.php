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
    public function index(Request $request): View
    {
        //
        $alumnos = Alumno::with('user')->oldest()->paginate(1);

        $query = $request->input('search');

        // Busca el alumno en la tabla de alumnos
        // $alumnos = Alumno::where('dni', 'like', "%$query%")
        //     ->orWhere('nombres', 'like', "%$query%")
        //     ->first();

        $alumnos = Alumno::with('user')
            ->where('dni', 'like', "%$query%")
            ->orWhere('nombres', 'like', "%$query%")
            ->paginate(10);

        if ($alumnos) {
            // Si se encuentra el alumno, muestra los detalles del alumno
            return view('dashboard.alumnos', compact('alumnos'));
        } else {
            // Si no se encuentra el alumno, puedes mostrar un mensaje o redirigir a la página principal, según tus necesidades.
            $mensaje = 'No se encontraron resultados para la búsqueda.';
            return view('dashboard.alumnos', compact('mensaje'));
        }

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


        $promedio = $notas->take(4)->avg('valor');

        $dia1 = 'lunes';
        $dia2 = 'martes';
        $dia3 = 'miercoles';
        $dia4 = 'jueves';
        $dia5 = 'viernes';
        $dia6 = 'sabado';


        $cursosLunes = $alumno->cursos
            ->filter(function ($curso) use ($dia1) {
                return $curso->dias_semana === $dia1;
            })
            ->sortBy('horario_entrada');

        $cursosMartes = $alumno->cursos
            ->filter(function ($curso) use ($dia2) {
                return $curso->dias_semana === $dia2;
            })
            ->sortBy('horario_entrada');

        $cursosMiercoles = $alumno->cursos
            ->filter(function ($curso) use ($dia3) {
                return $curso->dias_semana === $dia3;
            })->sortBy('horario_entrada');

        $cursosJueves = $alumno->cursos
            ->filter(function ($curso) use ($dia4) {
                return $curso->dias_semana === $dia4;
            })->sortBy('horario_entrada');

        $cursosViernes = $alumno->cursos
            ->filter(function ($curso) use ($dia5) {
                return $curso->dias_semana === $dia5;
            })->sortBy('horario_entrada');

        $cursosSabado = $alumno->cursos
            ->filter(function ($curso) use ($dia6) {
                return $curso->dias_semana === $dia6;
            })->sortBy('horario_entrada');

        return view('dashboard.show', compact(
            'alumno',
            'cursos',
            'notas',
            'promedio',
            'cursosLunes',
            'cursosMartes',
            'cursosMiercoles',
            'cursosJueves',
            'cursosViernes',
            'cursosSabado'
        ));

        // dd($id);
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
