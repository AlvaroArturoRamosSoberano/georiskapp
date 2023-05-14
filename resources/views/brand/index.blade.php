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
        <a href="{{ url('brand/create') }}" class="btn btn-primary btn-sm mb-2">Ingresar Nueva Linea</a>
        <table class="table align-middle table-sm table-responsive">
            <thead class="table-secondary">
                <tr style="text-align: center">
                    <th>#</th>
                    <th>Linea/Marca</th>
                    <th>Logo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                <tr style="text-align: center">
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td><img src="{{ asset('storage') . '/' . $brand->logo_path }}" class="img-thumbnail img-fluid m" alt="{{ $brand->name }}" width="100"></td>
                    <td>
                        <a href="{{ url('/brand/' . $brand->id . '/edit') }}" class="btn bg-warning btn-sm">
                            Editar
                        </a>
                        <form action="{{ url('/brand/' . $brand->id) }}" method="post" class="d-inline">
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
                <li class="page-item"><a class="page-link" href="{{ $brands->previousPageUrl() }}">Anterior</a></li>
                @for ($id = 1; $id <= $brands->lastPage(); $id++)
                    <li class="page-item {{ $brands->currentPage() == $id ? 'active' : '' }}">
                        <a class="page-link" href="{{ $brands->url($id) }}">{{ $id }}</a>
                    </li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{ $brands->nextPageUrl() }}">Siguiente</a></li>
            </ul>
        </nav>
    </div>
    @endsection