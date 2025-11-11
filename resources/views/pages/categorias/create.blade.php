@extends('pages.layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Categories List</h3>

            <a type="button " class="btn btn-success" href="">New Category</a>
            <table class="table align-items-center mb-0" ax>
                <thead>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="align-middle text-center">
                                {{ $category->id }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $category->name }}
                            </td>

                            </td>
                            <td class="align-middle text-center">
                                {{ $category->created_at }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $category->updated_at }}
                            </td>
                            <td>
                                <form action="" method="POST">
                                    {{-- @csrf
                                    @method('DELETE') --}}
                                    <button type="submit"
                                        class="btn btn-link text-danger p-0 m-0 align-baseline">Eliminar</button>
                                </form>
                            </td>


                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection
