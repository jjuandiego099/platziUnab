<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Leccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CursosController extends Controller
{
    function cursos()
    {
        $cursos = Curso::all();
        $categories = Categoria::all();
        return view('pages.dashboard', compact('cursos', 'categories'));
    }
    function lecciones($id)
    {
        $cursos = Curso::findOrFail($id);
        $this->authorize('editarLecciones', $cursos);

        $lecciones = $cursos->lecciones()->orderBy('orden', 'asc')->get();


        return view('pages.cursos.leccionesCurso', compact('cursos', 'lecciones'));
    }
    function table()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            //withCount() NO reemplaza los datos del curso, solo agrega el conteo como una columna extra.
            //busca la relacion en el modelo de curso y usa la llave curso_id para contar todas las inscripciones
            $cursos = Curso::withCount('inscripciones') //Crea automáticamente una propiedad inscripciones_count en cada curso
                ->orderBy('id', 'asc')
                ->paginate(10);
        } else if ($user->hasRole('teacher')) {
            $cursos = Curso::withCount('inscripciones')
                ->where('profesor_id', $user->id)
                ->orderBy('id', 'asc')
                ->paginate(10);
        }

        $categories = Categoria::all();

        return view('pages.cursos.table', compact('cursos', 'categories'));
    }
    function index($id)
    {
        $curso = Curso::with(['lecciones'])->findOrFail($id);
        $profesor = auth()->user();

        return view('pages.cursos.index', compact('curso', 'profesor'));
    }
    public function filterByCategory($id)
    {
        $category = Categoria::find($id);
        $categories = Categoria::all();
        $cursos = Curso::where('categoria_id', $id)->get();

        return view('pages.dashboard', compact('cursos', 'categories', 'category'));
    }

    public function destroy(Request $request, $id)
    {
        $cursos = Curso::find($id);
        $this->authorize('editarLecciones', $cursos);
        $cursos->delete();
        //se asigna un input con value table para redirigir de unuevo a esa vista
        if ($request->from === 'table') {
            return redirect()->route('cursos.table');
        }

        //se redirige  a home si viene de index
        return redirect()->route('home');
    }
}
