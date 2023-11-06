<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignarController;
use App\Http\Controllers\AsignarCursoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ConductaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\JustificacionesController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuariosController;
use App\Models\AsignacionesCurso;
use App\Models\usuarios;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/alumnos', AlumnoController::class)->names('alumnos');

    Route::resource('/profesores', ProfesoresController::class)->names('profesores');

    Route::resource('/usuarios', UsuariosController::class)->names('usuarios');

    Route::resource('/roles', RoleController::class)->names('roles');

    Route::resource('/permisos', PermisosController::class)->names('permisos');

    Route::resource('/asignar', AsignarController::class)->names('asignar');

    Route::resource('/asistencias', AsistenciaController::class)->names('asistencia');

    Route::get('/buscar-asistencia', [AsistenciaController::class, 'buscar'])->name('asistencia.buscar');

    Route::get('/alumnos/{id}/asignar-curso', [AsignarCursoController::class, 'mostrarFormulario'])->name('formulario-asignar-curso');

    Route::post('/alumnos/{id}/asignar-curso', [AsignarCursoController::class, 'asignarCurso'])->name('asignar-curso');

    Route::resource('/cursos', CursoController::class)->names('cursos');

    Route::resource('/validar-dni', NotaController::class)->names('notas');

    Route::post('/validar-dni', [NotaController::class, 'validarDNI'])->name('dni.validar');
    Route::post('/asignar-nota', [NotaController::class, 'store'])->name('asignar-nota');

    Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil.mostrar');

    Route::resource('/conducta', ConductaController::class)->names('conducta');

    Route::resource('/justificaciones', JustificacionesController::class)->names('justificaciones');

    Route::resource('/notas',NotaController::class)->names('Notas');
});
