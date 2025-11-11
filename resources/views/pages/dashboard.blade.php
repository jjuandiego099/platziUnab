@extends('pages.layouts.app')
@section('content')
    <style>
        .category-card {
            transition: all 0.3s ease;
            border-width: 2px !important;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            border-color: #e91e63 !important;
            /* rosado tipo Material Dashboard */
        }

        .border-primary {
            border-color: #e91e63 !important;
        }

        .fw-bold {
            color: #333;
        }
    </style>
    <div class="row">
        <div class="ms-3">
            <h3 class="mb-0 h4 font-weight-bolder">Platzi Unab</h3>
            <p class="mb-4">
                Platzi UNAB es una iniciativa educativa de la Universidad Autónoma de Bucaramanga en alianza con Platzi, que
                impulsa el aprendizaje continuo y la formación en habilidades digitales para estudiantes y profesionales.
            </p>
        </div>

    </div>
    <div class="container my-4">
        <h5 class="text-center fw-bold mb-4 text-primary">Categorías</h5>

        <div class="row g-3 justify-content-start">
            <!-- Opción "Todos" -->
            <div class="col-6 col-md-3 col-lg-2 d-flex">
                <a href="{{ route('home') }}" class="text-decoration-none flex-fill">
                    <div
                        class="card text-center shadow-sm border {{ !isset($category) ? 'border-primary' : 'border-0' }} category-card h-100">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <span class="fw-bold text-dark">Todas</span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Listado de categorías -->
            @foreach ($categories as $cat)
                <div class="col-6 col-md-3 col-lg-2 d-flex">
                    <a href="{{ route('filtro.categorias', $cat->id) }}" class="text-decoration-none flex-fill">
                        <div
                            class="card text-center shadow-sm border {{ isset($category) && $category->id == $cat->id ? 'border-primary' : 'border-0' }} category-card h-100">
                            <div class="card-body d-flex align-items-center justify-content-center">
                                <span class="fw-bold text-dark">{{ $cat->name }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>



    <div class="container-fluid px-3 my-4" style="overflow-x: hidden;">

        <div class="row g-3">
            @foreach ($cursos as $curso)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <!-- Imagen del curso -->
                        <img src="{{ $curso->imagen ?? 'https://picsum.photos/400/250' }}" class="card-img-top img-fluid"
                            alt="Imagen del curso {{ $curso->titulo }}">

                        <!-- Contenido -->
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold text-primary">{{ $curso->titulo }}</h5>
                                <p class="card-text text-muted mb-3">{{ $curso->descripcion }}</p>
                            </div>

                            <!-- Sección fija inferior -->
                            <div class="mt-auto">
                                <div class="mb-2">
                                    <span class="badge bg-info text-white d-block mb-1">
                                        Categoría: {{ $curso->categoria->name }}
                                    </span>
                                    <span class="badge bg-info text-dark d-block ">
                                        Profesor: {{ $curso->profesor->name }}
                                    </span>
                                </div>

                                <!-- Botón -->
                                <button class="btn btn-outline-primary btn-sm w-100" disabled>
                                    Ver detalles
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
