@extends('layouts.app')
@section('content')
<div class="container-fluid">

    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <script>
            setTimeout(function() {
                document.querySelector('.alert').remove();
            }, 3000);
        </script>
    </div>
    @endif

    <div class="container">
        <div class=" d-flex justify-content-between">
            <a href="{{ url('company/create') }}" class="btn btn-primary btn-sm mb-2">Registrar nueva empresa</a>
            <form class="d-flex" action="{{ route('company.index') }}" method="GET">
                <input class="me-2 mb-2" type="search" placeholder="Buscar" name="q">
                <button class="btn btn-primary btn-sm mb-2" type="submit">Buscar</button>
                @if (request('q'))
                <a href="{{ route('company.index') }}" class="btn btn-secondary btn-sm ms-2 mb-2">Mostrar todo</a>
                @endif
            </form>
        </div>


        <table class="table align-middle table-sm table-responsive-md">
            <thead class="table-secondary">
                <tr style="text-align: center">
                    <th>#</th>
                    <th>Imagen Establecimiento</th>
                    <th>Identificador</th>
                    <th>Descripción</th>
                    <th>Tipo de Compañia</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($companies as $company)
                <tr style="text-align: center;">
                    <td>{{ $company->id }}</td>
                    <td class="align-middle">
                        <img src="{{ asset('storage') . '/' . $company->image_path }}" class="img-thumbnail img-fluid" alt="{{ $company->identifier_key }}" style="max-height: 100px;">
                    </td>
                    <td>{{ $company->identifier_key }}</td>
                    <td>{{ $company->description }}</td>
                    <td>{{ $company->kind_company }}</td>
                    <td>{{ $company->brand->name }}</td>
                    <td>

                        <a href="{{ url('/company/' . $company->id . '/edit') }}" class="btn bg-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ url('/company/' . $company->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn bg-danger btn-sm ">
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <!--pagination-->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end pagination-sm">
                <li class="page-item"><a class="page-link" href="{{ $companies->previousPageUrl() }}">Anterior</a></li>
                @for ($id = 1; $id <= $companies->lastPage(); $id++)
                    <li class="page-item {{ $companies->currentPage() == $id ? 'active' : '' }}">
                        <a class="page-link" href="{{ $companies->url($id) }}">{{ $id }}</a>
                    </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $companies->nextPageUrl() }}">Siguiente</a></li>
            </ul>
        </nav>
    </div>
</div>

@endsection

