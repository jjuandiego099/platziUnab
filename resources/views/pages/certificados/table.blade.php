@extends('pages.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Lista Cursos</h3>
            @role('teacher')
                <a type="button " class="btn btn-success" href="{{ route('cursos.create') }}">Nuevo Curso</a>
            @endrole
            <table class="table align-items-center mb-0" ax>
                <thead>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Profesor</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoria
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nivel</th>
                    @role('teacher')
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estudiantes
                        </th>
                    @endrole



                    @role('teacher')
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    @endrole
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> </th>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            @role('student')
                                <td class="align-middle text-center">
                                    {{ $curso->inscripciones->first()->id }}
                                </td>
                            @endrole
                            @role('teacher')
                                <td class="align-middle text-center">
                                    {{ $curso->id }}
                                </td>
                            @endrole
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
                            
                            @role('student')
                                <td>
                                    <form action="{{ route('certificados.download', $curso) }}"
                                        method="get">
                                        {{-- se usa post xq html solo permite get y post --}}
                                  
                                        
                                        <button type="submit"
                                            class="btn btn-link text-blue p-0 m-0 align-baseline">Descargar</button>
                                    </form>
                                </td>
                            @endrole



                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $cursos->links() }}
        </div>
    </div>
@endsection
