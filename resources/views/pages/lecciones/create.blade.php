@extends('pages.layouts.app')

@section('content')
    <h2 class="mb-4">Nueva Leccion</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('lecciones.store', $curso->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- invisible para tener el category id --}}
                <input type="hidden" name="curso_id" value="{{ $curso->id }}"> 
                <!-- Nombre del Producto -->
                @error('titulo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="titulo" class="form-label">Titulo De La Leccion</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                </div>

                <!-- video -->
                @error('video_url')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="video_url" class="form-label">Video Url</label>
                    <input type="text" class="form-control" id="video_url" name="video_url"
                        value="{{ old('video_url') }}">
                </div>

                <!-- contenido -->
                @error('contenido')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="contenido" class="form-label">Contenido</label>
                    <input type="text" class="form-control" id="contenido" name="contenido"
                        value="{{ old('contenido') }}">
                </div>
                <!-- Botón de Envío -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Guardar Leccion</button>
                </div>
            </form>

        </div>
    </div>
@endsection
