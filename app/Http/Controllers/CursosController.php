<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Leccion;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    function cursos(){
        $cursos=Curso::all();
        $categories=Categoria::all();
         return view('pages.dashboard',compact('cursos','categories'));
    }
    function index($id){
         $curso = Curso::with(['lecciones'])->findOrFail($id);
         return view('pages.cursos.index',compact('curso'));
    }
     public function filterByCategory($id)
    {
        $category = Categoria::find($id);
        $categories = Categoria::all();
        $cursos = Curso::where('categoria_id', $id)->get();

        return view('pages.dashboard', compact('cursos', 'categories', 'category'));
    }
}
