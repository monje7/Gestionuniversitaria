<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para Estudiantes
Route::resource('estudiantes', EstudianteController::class)->middleware('auth');

// Rutas para Profesores
Route::resource('profesores', ProfesorController::class)->middleware('auth');

// Rutas para Cursos
Route::resource('cursos', CursoController::class)->middleware('auth');

// Rutas para Matriculas
Route::resource('matriculas', MatriculaController::class)->middleware('auth');
