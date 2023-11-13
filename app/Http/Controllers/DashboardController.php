<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\Curso;
use App\Models\profesores;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $alumnos = alumno::count();
        $profesores = profesores::count();
        $cursos = Curso::count();

        return view('dashboard',compact('alumnos', 'profesores', 'cursos'));
    }

    
}
