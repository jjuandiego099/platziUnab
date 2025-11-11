<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function create()
    {
        $categories = Categoria::all();
        return view('pages.categorias.create', compact('categories'));
    }
}
