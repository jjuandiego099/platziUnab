<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Leccion;
use Illuminate\Http\Request;

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
        $lecciones = $cursos->lecciones()->orderBy('orden', 'asc')->get();

        return view('pages.cursos.leccionesCurso', compact('cursos', 'lecciones'));
    }
    function table()
    {
        $cursos = Curso::orderBy('id', 'asc')->paginate(10);
        $categories = Categoria::all();
        return view('pages.cursos.table', compact('cursos', 'categories'));
    }
    function index($id)
    {
        $curso = Curso::with(['lecciones'])->findOrFail($id);
        return view('pages.cursos.index', compact('curso'));
    }
    public function filterByCategory($id)
    {
        $category = Categoria::find($id);
        $categories = Categoria::all();
        $cursos = Curso::where('categoria_id', $id)->get();

        return view('pages.dashboard', compact('cursos', 'categories', 'category'));
    }
    
     public function Destroy($id)
    {
        $cursos = Curso::find($id);
        $cursos->delete();
        return redirect()->route('cursos.table');
    }
}
