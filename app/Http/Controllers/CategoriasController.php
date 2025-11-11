<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categories = Categoria::orderBy('id', 'asc')->paginate(10);
        return view('pages.categorias.table', compact('categories'));
    }
    public function create()
    {

        return view('pages.categorias.create');
    }
    public function store(Request $request)
    {
        Categoria::create([
            'name' => $request->get('name')
        ]);
        return redirect()->route('categorias.table');
    }
    public function destroy($id)
    {
        $categories = Categoria::find($id);
        $categories->delete();
        return redirect()->route('categorias.table');
    }
}
