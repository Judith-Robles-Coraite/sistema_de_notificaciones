<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\RepresentanteController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AulasController;
use App\Http\Controllers\AsistenciaController;


Route::get('/', function () {
    return view('Home');
});


Route::get('/login', [SessionsController::class,'create']);

Route::post('/login', [SessionsController::class,'store']);

Route::get('/estudiantes_registrar', [EstudiantesController::class,'vista'])->name('register.pricipal');

Route::post('/estudiantes_registrar', [EstudiantesController::class,'create'])->name('crear_estu');

Route::get('/estudiantes_lista', [EstudiantesController::class,'index'])->name('leer.principal');

Route::get('/estudiantes_editar/{id_estudiantes}',  [EstudiantesController::class,'edit'])->name('edit');

Route::post('/estudiantes_editar/{id_estudiantes}',  [EstudiantesController::class,'update'])->name('edit.secundaria');

//Route::get('/estudiantes_lista',  [EstudiantesController::class,'busqueda'])->name('busqueda');

Route::delete('/estudiantes_lista/{id_estudiantes}',  [EstudiantesController::class,'destroy'])->name('borrar');

//Route::get('editar/{alumno}', 'AlumnosController@edit')->name('alumno.edit');
//Route::put('update/{alumno}', 'AlumnosController@update')->name('alumno.update');

//--------------Representante
Route::resource('/representante',RepresentanteController::class);

//--------------Registros

Route::resource('/registros',RegistrosController::class);

Route::resource('/docentes',DocentesController::class);
//---------Usuarios

Route::resource('/usuarios',UsuarioController::class);

Route::get('/usuarios/index', [UsuarioController::class,'index'])->name('usuarios.mostrar');

Route::get('/usuarios/index1', [UsuarioController::class,'index1'])->name('usuarios.mostraredit');

Route::get('/docentes/create/{id_usuario}',  [DocentesController::class,'mostrarusuario'])->name('mostrarusuario');

Route::get('/docentes/edit/{id_usuario}',  [DocentesController::class,'mostrarusuarioedit'])->name('mostrarusuarioedit');


Route::get('/registros/create/{id_estudiantes}',  [RegistrosController::class,'mostrarestudiante'])->name('mostrarestudiante');

Route::get('/registros/create1/{id_representantes}',  [RegistrosController::class,'mostrarrepresentante'])->name('mostrarrepresentante');

//Route::get('/registros/create/{id_estudiantes}',  [RegistrosController::class,'mostrarestudiante'])->name('mostrarestudiante');

Route::get('/representates/index', [RepresentanteController::class,'index'])->name('respresentates.estudiantes');

//Route::resource('/usuarios/index',UsuarioController::class,'index')->name('usuario');

//---------------AULAS-------------------------

Route::resource('/aulas',AulasController::class);

Route::get('/aulas/create/{id_docente}',  [AulasController::class,'mostrarprofesor'])->name('mostrarprofesor');

//------------------ASISTENCIA-------------------

Route::resource('/asistencia',AsistenciaController::class);
