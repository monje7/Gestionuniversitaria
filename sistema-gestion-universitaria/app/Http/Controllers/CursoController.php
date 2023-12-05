<?php

// app/Http/Controllers/CursoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Laracasts\Flash\Flash;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_curso' => 'required',
            'codigo_curso' => 'required',
            'profesor_id' => 'required|exists:profesores,id',
        ]);

        Curso::create($request->all());

        flash('Curso creado exitosamente.')->success();

        return redirect()->route('cursos.index');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre_curso' => 'required',
            'codigo_curso' => 'required',
            'profesor_id' => 'required|exists:profesores,id',
        ]);

        $curso->update($request->all());

        flash('Curso actualizado exitosamente.')->success();

        return redirect()->route('cursos.index');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        flash('Curso eliminado exitosamente.')->success();

        return redirect()->route('cursos.index');
    }
}

