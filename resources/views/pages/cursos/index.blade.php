@extends('pages.layouts.app')

@section('content')
    <div class="container-fluid px-3 my-5" style="overflow-x: hidden;">

        <!-- Card principal del curso -->
        <div class="card shadow-lg border-0 mx-auto mb-5" style="max-width: 900px;">
            <img src="{{ $curso->imagen ?? 'https://picsum.photos/900/400' }}" class="card-img-top img-fluid"
                alt="Imagen del curso {{ $curso->titulo }}" style="object-fit: cover; height: 400px;">

            <div class="card-body p-4">
                <h2 class="card-title text-primary fw-bold mb-3">{{ $curso->titulo }}</h2>

                <div class="d-flex flex-wrap gap-2 mb-4">
                    <span class="badge bg-info text-white px-3 py-2">
                        <strong>Categoría:</strong> {{ $curso->categoria->name ?? 'Sin categoría' }}
                    </span>
                    <span class="badge bg-secondary text-white px-3 py-2">
                        <strong>Nivel:</strong> {{ $curso->nivel }}
                    </span>
                    <span class="badge bg-info text-white px-3 py-2">
                        <strong>Profesor:</strong> {{ $curso->profesor->name ?? 'No asignado' }}
                    </span>
                </div>

                <p class="card-text text-muted fs-5 mb-4">
                    {{ $curso->descripcion }}
                </p>



                <div class="text-center d-flex justify-content-between">
                    @role('student')
                        <a class="btn btn-primary btn-lg px-5 inscribirme-btn" href="{{ route('home') }}">
                            Inscribirme
                        </a>
                    @endrole
                    @guest
                        <a class="btn btn-primary btn-lg px-5 inscribirme-btn" href="{{ route('login') }}">
                            Registrarme
                        </a>
                    @endguest
                    @can('editarLecciones', $curso)
                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-lg px-5 inscribirme-btn">Eliminar Curso</button>
                        </form>
                    @endcan



                </div>
            </div>
        </div>
        @auth
            <!-- Sección de lecciones -->

            <div class="card shadow-sm border-0 mx-auto" style="max-width: 900px;">

                <div class="card-body p-4">
                    <h4 class="fw-bold text-primary mb-3">Lecciones del curso</h4>
                    @can('editarLecciones', $curso)
                        <form action="{{ route('cursos.lecciones', $curso->id) }}" method="GET">

                            <button type="submit" class="btn btn-primary btn-lg px-5 inscribirme-btn">Editar Lecciones</button>
                        </form>
                    @endcan

                    @if ($curso->lecciones->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($curso->lecciones->sortBy('orden') as $leccion)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>Leccion {{ $leccion->orden }}: {{ $leccion->titulo }}</strong><br>
                                        <small class="text-muted">{{ $leccion->contenido }}</small>
                                    </div>
                                    <a href="{{ $leccion->video_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        Ver video
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted text-center mt-3">Este curso aún no tiene lecciones disponibles.</p>
                    @endif
                </div>
            </div>
        @endauth

    </div>

    <style>
        .inscribirme-btn {
            background-color: #e91e63;
            border: none;
            transition: all 0.3s ease;
        }

        .inscribirme-btn:hover {
            background-color: #c2185b;
            box-shadow: 0 6px 14px rgba(233, 30, 99, 0.3);
            transform: translateY(-3px);
        }

        .list-group-item:hover {
            background-color: #fce4ec;
            transition: 0.3s ease;
        }
    </style>
@endsection
