@extends('pages.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Lista Cursos</h3>
            <a type="button " class="btn btn-success" href="{{ route('cursos.create') }}">Nuevo Curso</a>

            <table class="table align-items-center mb-0" ax>
                <thead>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Profesor</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoria
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nivel</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estudiantes</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>

                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> </th>

                    @role('teacher')
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    @endrole
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> </th>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td class="align-middle text-center">
                                {{ $curso->id }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $curso->titulo }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $curso->profesor->name }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $curso->categoria->name }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $curso->nivel }}
                            </td>

                            </td>
                            <td class="align-middle text-center">
                                {{ $curso->inscripciones_count }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $curso->created_at }}
                            </td>
                            <td>
                                <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="from" value="table">
                                    <button type="submit"
                                        class="btn btn-link text-danger p-0 m-0 align-baseline">Eliminar</button>
                                </form>
                            </td>
                            <td>
                                @role('teacher')
                                    <form action="{{ route('cursos.lecciones', $curso->id) }}" method="GET">

                                        <button type="submit"
                                            class="btn btn-link text-blue p-0 m-0 align-baseline">Editar</button>
                                    </form>
                                @endrole

                            </td>


                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $cursos->links() }}
        </div>
    </div>
@endsection
