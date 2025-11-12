<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class LeccionesController extends Controller
{
     public function destroy($id,$id2)
    {
        $cursos = Curso::find($id);
        $leccion = $cursos->lecciones;
        $leccion->delete($id2);
        return redirect()->route('cursos.table');
    }
}
