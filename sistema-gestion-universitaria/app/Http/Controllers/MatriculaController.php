<?php

// app/Http/Controllers/MatriculaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use Laracasts\Flash\Flash;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::all();
        return view('matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        return view('matriculas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_matriculacion' => 'required|date',
            'calificacion' => 'nullable|numeric|min:0|max:10',
        ]);

        Matricula::create($request->all());

        flash('Matrícula creada exitosamente.')->success();

        return redirect()->route('matriculas.index');
    }

    public function show(Matricula $matricula)
    {
        return view('matriculas.show', compact('matricula'));
    }

    public function edit(Matricula $matricula)
    {
        return view('matriculas.edit', compact('matricula'));
    }

    public function update(Request $request, Matricula $matricula)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_matriculacion' => 'required|date',
            'calificacion' => 'nullable|numeric|min:0|max:10',
        ]);

        $matricula->update($request->all());

        flash('Matrícula actualizada exitosamente.')->success();

        return redirect()->route('matriculas.index');
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();

        flash('Matrícula eliminada exitosamente.')->success();

        return redirect()->route('matriculas.index');
    }
}
