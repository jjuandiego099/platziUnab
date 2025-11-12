<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class InscripcionesController extends Controller
{
    //  public function store($id)
    // {
    //     $curso = Curso::findOrFail($id);
    //     $user = Auth::user();

    //     // Evita duplicados
    //     $yaInscrito = Inscripcion::where('user_id', $user->id)
    //                               ->where('curso_id', $curso->id)
    //                               ->exists();

    //     if ($yaInscrito) {
    //         return redirect()->back()->with('info', 'Ya estás inscrito en este curso.');
    //     }

    //     // Crea el registro
    //     Inscripcion::create([
    //         'user_id' => $user->id,
    //         'curso_id' => $curso->id,
    //         'progreso' => 0, // puedes iniciar en 0%
    //     ]);

    //     return redirect()->back()->with('success', '¡Te has inscrito exitosamente en el curso!');
    // }
}
