@extends('pages.layouts.app')

@section('content')
 <h2 class="mb-4">Nuevo Curso</h2>
    <div class="card">
        <div class="card-body">

            {{-- <form action="{{ route('cursos.store') }}" method="post" enctype="multipart/form-data"> --}}
                @csrf




                <!-- Nombre del Producto -->
                @error('titulo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="titulo" class="form-label">Nombre del Curso</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                </div>

                <!-- Descripción del Producto -->
                @error('descripcion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" rows="3"
                        value= '{{ old('descripcion') }}'>
                </div>

                <!-- Precio del Producto -->
                @error('imagen')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="imagen" class="form-label">Imagen Url</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" step="0.01" min="0"
                        value="{{ old('imagen') }}">
                </div>


                <!-- Marca del Producto -->
                @error('nivel')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <select name="nivel" class="form-control" id="nivel">
                        <option selected disabled>-- Selecciona una nivel --</option>

                        <option value="Básico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>

                    </select>
                </div>
                @error('categoria_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <select name="categoria_id" class="form-control" id="categoria_id">
                        <option selected disabled>-- Selecciona una categoria --</option>

                        @foreach ($categorias as $item)
                            <option value={{ $item->id }}>{{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>




                <!-- Botón de Envío -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>


            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            {{-- <form action="{{ route('cursos.store') }}" method="post" enctype="multipart/form-data"> --}}
                @csrf




                <!-- Nombre del Producto -->
                @error('titulo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="titulo" class="form-label">Nombre del Curso</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                </div>

                <!-- Descripción del Producto -->
                @error('descripcion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" rows="3"
                        value= '{{ old('descripcion') }}'>
                </div>

                <!-- Precio del Producto -->
                @error('imagen')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <label for="imagen" class="form-label">Imagen Url</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" step="0.01" min="0"
                        value="{{ old('imagen') }}">
                </div>


                <!-- Marca del Producto -->
                @error('nivel')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <select name="nivel" class="form-control" id="nivel">
                        <option selected disabled>-- Selecciona una nivel --</option>

                        <option value="Básico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>

                    </select>
                </div>
                @error('categoria_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <div class="input-group input-group-outline mb-3">
                    <select name="categoria_id" class="form-control" id="categoria_id">
                        <option selected disabled>-- Selecciona una categoria --</option>

                        @foreach ($categorias as $item)
                            <option value={{ $item->id }}>{{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>




                <!-- Botón de Envío -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>


            </form>
        </div>
    </div>
@endsection