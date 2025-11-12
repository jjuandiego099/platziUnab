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
        $cursos = Curso::orderBy('id', 'asc')->paginate(10);
        $categories = Categoria::all();
        
        return view('pages.cursos.table', compact('cursos', 'categories'));
    }
    function index($id)
    {
        $curso = Curso::with(['lecciones'])->findOrFail($id);
        $profesor = auth()->user();
        
        return view('pages.cursos.index', compact('curso','profesor'));
    }
    public function filterByCategory($id)
    {
        $category = Categoria::find($id);
        $categories = Categoria::all();
        $cursos = Curso::where('categoria_id', $id)->get();

        return view('pages.dashboard', compact('cursos', 'categories', 'category'));
    }
    
     public function destroy($id)
    {   
        $cursos = Curso::find($id);
        $this->authorize('editarLecciones', $cursos);
        $cursos->delete();
       
        return redirect()->route('home');
    }
}
