<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InscripcionesController extends Controller
{
     public function store($id)
    {
        $curso = Curso::findOrFail($id);
        $user = auth::user();

        // Evita duplicados
        $yaInscrito = Inscripcion::where('user_id', $user->id)
                                  ->where('curso_id', $curso->id)
                                  ->exists();

        if ($yaInscrito) {
            return redirect()->route('home');
        }

        // Crea el registro
        Inscripcion::create([
            'user_id' => $user->id,
            'curso_id' => $curso->id,
            'progreso' => 0, // puedes iniciar en 0%
        ]);

        return redirect()->route('home');
    }
}
