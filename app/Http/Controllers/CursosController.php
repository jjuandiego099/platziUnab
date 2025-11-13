<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Leccion;
use Illuminate\Http\Request;


class CursosController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        return view('pages.cursos.create', compact('categorias'));
    }
    public function store(Request $request)
    {
        $request->validate([
            //nombres identicos en el form de
            'titulo'       => 'required|string|max:255',
            'descripcion'  => 'required|string',
            'imagen'       => 'required|url',
            'nivel'        => 'required|string|in:Básico,Intermedio,Avanzado',
            'categoria_id' => 'required|exists:categorias,id',

        ]);

        $curso = new Curso();
        // primer titulo viene del campo en la bd
        // segundo titulo viene del id de cada campo del formulario del html
        $curso->titulo = $request->get('titulo');
        $curso->descripcion = $request->get('descripcion');
        $curso->imagen = $request->get('imagen');
        $curso->nivel = $request->get('nivel');
        $curso->categoria_id = $request->get('categoria_id');
        $curso->profesor_id = auth()->id();

        $curso->save();

        return redirect()->route('cursos.table');
    }

    function home()
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
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            //withCount() NO reemplaza los datos del curso, solo agrega el conteo como una columna extra.
            //busca la relacion en el modelo de curso y usa la llave curso_id para contar todas las inscripciones
            $cursos = Curso::withCount('inscripciones') //Crea automáticamente una propiedad inscripciones_count en cada curso
                ->orderBy('id', 'asc')
                ->paginate(10);
        } else if ($user->hasRole('teacher')) {
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

        return view('pages.cursos.table', compact('cursos', 'categories'));
    }
    function index($id)
    {
        $curso = Curso::with(['lecciones'])->findOrFail($id);
        $profesor = auth()->user();

        return view('pages.cursos.index', compact('curso', 'profesor'));
    }
    public function filterByCategory($id)
    {
        $category = Categoria::find($id);
        $categories = Categoria::all();
        $cursos = Curso::where('categoria_id', $id)->get();

        return view('pages.dashboard', compact('cursos', 'categories', 'category'));
    }

    public function destroy(Request $request, $id)
    {
        $cursos = Curso::find($id);
        $this->authorize('editarLecciones', $cursos); //polity
        $cursos->delete();
        //se asigna un input con value table para redirigir de unuevo a esa vista
        if ($request->from === 'table') {
            return redirect()->route('cursos.table');
        }

        //se redirige  a home si viene de index
        return redirect()->route('home');
    }
}
