<?php

namespace App\Http\Controllers;

use App\Models\Curso;
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
}
