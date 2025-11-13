<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Leccion;
use Illuminate\Http\Request;

class LeccionesController extends Controller
{
    public function destroy($id, $id2)
    {
        $cursos = Curso::find($id);
        $leccion = $cursos->lecciones()->findOrFail($id2);
        $leccion->delete();
        return redirect()->route('cursos.lecciones', $cursos->id);
    }
    public function create($id)
    {   
        $curso = Curso::findOrFail($id);
        $this->authorize('editarLecciones', $curso);

        return view('pages.lecciones.create', compact('curso'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'curso_id'  => 'required|exists:cursos,id',
            'titulo'    => 'required|string|max:255',
            'video_url' => 'required|url',
            'contenido' => 'required|string',

        ]);

        $curso = Curso::findOrFail($request->curso_id);
        $leccionesActuales = $curso->lecciones()->count();
        $ordenCorrecto = $leccionesActuales + 1;


        $leccion = Leccion::create([
            'curso_id'  => $request->curso_id,
            'titulo'    => $request->titulo,
            'video_url' => $request->video_url,
            'contenido' => $request->contenido,
            'orden'     => $ordenCorrecto,
        ]);

        return redirect()->route('cursos.lecciones', $leccion->curso_id);
    }
}
