<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\alumno;
use App\Models\Profesor;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::oldest()->paginate(10);
        return view('dashboard.userList', compact('users'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        if ($user) {
            if ($request->input('tipo_usuario') === 'Alumno') {
                return view('dashboard.alumCreate',['user' => $user]);
                
            } elseif ($request->input('tipo_usuario') === 'Profesor') {

                return view('dashboard.profCreate',['user' => $user]);
            }

            return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
        } else {
            return redirect()->route('usuarios.index')->with('error', 'Hubo un error al crear el usuario.');
        }


        dd($request->all());
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
