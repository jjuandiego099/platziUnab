<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curso;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificadosController extends Controller
{
    function table()
    {
        $user = auth()->user();

       if ($user->hasRole('teacher')) {
            $cursos = Curso::withCount('inscripciones')
                ->where('profesor_id', $user->id)
                ->orderBy('id', 'asc')
                ->paginate(10);
        } else if ($user->hasRole('student')) {
            //whereHas filtra cursos donde exista una inscripción cuyo user_id sea el del estudiante actual.
            $cursos = Curso::whereHas('inscripciones', function ($query) use ($user) {
                //$query es la consulta sobre el modelo Inscripcion, NO sobre Curso.
                //curso devuelve una coleccion 

                $query->where('user_id', $user->id);
                //se filtra en el query que el usuario autenticado coincida con el de la tabla incscripcion
            })
                ->withCount('inscripciones')
                ->orderBy('id', 'asc')
                ->paginate(10);
        }

        $categories = Categoria::all();

        return view('pages.certificados.table', compact('cursos', 'categories'));
    }
     public function download(Curso $curso)
    {
        $user = auth()->user();

        // Puedes pasar más datos si quieres
        $pdf = Pdf::loadView('pages.certificados.index', [
            'user' => $user,
            'curso' => $curso
        ]);
        // En el controlador

$pdf->setPaper([0, 0, 890.89, 595.28], 'landscape'); // Tamaño exacto A4

        $nombreArchivo = 'certificado_'.$user->id.'_curso_'.$curso->id.'.pdf';

        return $pdf->download($nombreArchivo);
    }
}
