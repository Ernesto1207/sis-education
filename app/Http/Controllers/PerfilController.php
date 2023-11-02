<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\profesores;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    //
    public function show()
    {
        $usuario = Auth::user();
        $alumnos = $usuario->alumno; 
        $profesor = $usuario->profesores;

        return view('profile.mostrar', compact('usuario','alumnos', 'profesor'));
    }
}
