<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor;
use Laracasts\Flash\Flash;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all();
        return view('profesores.index', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'area_especializacion' => 'required',
        ]);

        Profesor::create($request->all());

        flash('Profesor creado exitosamente.')->success();

        return redirect()->route('profesores.index');
    }

    public function show(Profesor $profesor)
    {
        return view('profesores.show', compact('profesor'));
    }

    public function edit(Profesor $profesor)
    {
        return view('profesores.edit', compact('profesor'));
    }

    public function update(Request $request, Profesor $profesor)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'area_especializacion' => 'required',
        ]);

        $profesor->update($request->all());

        flash('Profesor actualizado exitosamente.')->success();

        return redirect()->route('profesores.index');
    }

    public function destroy(Profesor $profesor)
    {
        $profesor->delete();

        flash('Profesor eliminado exitosamente.')->success();

        return redirect()->route('profesores.index');
    }
}
