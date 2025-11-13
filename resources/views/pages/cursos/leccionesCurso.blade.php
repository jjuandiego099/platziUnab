@extends('pages.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Lecciones </h3>
            <h4>Curso : {{ $cursos->titulo }}</h4>
            <a type="button " class="btn btn-success" href="{{ route('lecciones.create',$cursos->id) }}">Nueva Leccion</a>

            <table class="table align-items-center mb-0" ax>
                <thead>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Orden</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>

                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>

                </thead>
                <tbody>
                    @foreach ($lecciones as $leccion)
                        <tr>
                            <td class="align-middle text-center">
                                {{ $leccion->orden }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $leccion->titulo }}
                            </td>

                            </td>
                            <td class="align-middle text-center">
                                {{ $leccion->created_at }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $leccion->updated_at }}
                            </td>
                            <td>
                                <form action="{{ route('lecciones.destroy', [$cursos->id , $leccion->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-link text-danger p-0 m-0 align-baseline">Eliminar</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{-- {{ $leccion->links() }} --}}
        </div>
    </div>
@endsection
