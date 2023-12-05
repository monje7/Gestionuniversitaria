<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Laracasts\Flash\Flash;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'fecha_nacimiento' => 'required|date',
        ]);

        Estudiante::create($request->all());

        flash('Estudiante creado exitosamente.')->success();

        return redirect()->route('estudiantes.index');
    }

    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'fecha_nacimiento' => 'required|date',
        ]);

        $estudiante->update($request->all());

        flash('Estudiante actualizado exitosamente.')->success();

        return redirect()->route('estudiantes.index');
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        flash('Estudiante eliminado exitosamente.')->success();

        return redirect()->route('estudiantes.index');
    }
}
