@extends('layouts.app')
@section('content')

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <title>Table</title>
    </head>

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


        <body>
            <div class="containertab m-auto">
                <div class="table_header">
                    <a href="{{ url('companyRiskAspect/create') }}" class="btn btn-primary btn-sm">Ingresar Nueva Linea</a>
                    <div class="input_search">
                        <input type="text" class="search-input" placeholder="Buscar" />
                        <i class="bi bi-search" id="search"></i>
                    </div>
                </div>

                <div class="container">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Compañia</th>
                                <th>Aspecto de riesgo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companyRiskAspects as $companyRiskAspect)
                                <tr>
                                    <td>{{ $companyRiskAspect->id }}</td>
                                    <td>{{ $companyRiskAspect->company->identifier_key }}</td>
                                    <td>{{ $companyRiskAspect->riskAspect->name }}</td>
                                    <td>
                                        <button type="button"
                                            onclick="window.location.href='{{ url('/companyRiskAspect/' . $companyRiskAspect->id . '/edit') }}'"
                                            class="btn bg-transparent btn-sm">
                                            <i class="bi bi-pencil-square" id="icons"></i>
                                        </button>

                                        <form action="{{ url('/companyRiskAspect/' . $companyRiskAspect->id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('¿Quieres borrar?')"
                                                class="btn bg-transparent btn-sm">
                                                <i class="bi bi-trash" id="icons"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <section class="table_footer">
                    <!--pagination-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end pagination-sm ">
                            <li class="page-item"><a class="page-link"
                                    href="{{ $companyRiskAspects->previousPageUrl() }}">Anterior</a>
                            </li>
                            @for ($id = 1; $id <= $companyRiskAspects->lastPage(); $id++)
                                <li class="page-item {{ $companyRiskAspects->currentPage() == $id ? 'active' : '' }}">
                                    <a class="page-link"
                                        href="{{ $companyRiskAspects->url($id) }}">{{ $id }}</a>
                                </li>
                            @endfor
                            <li class="page-item"><a class="page-link"
                                    href="{{ $companyRiskAspects->nextPageUrl() }}">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </section>
            </div>
        </body>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.search-input').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('tbody tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });

                $('#reset-search').on('click', function() {
                    $('.search-input').val('');
                    $('tbody tr').show();
                });
            });
        </script>
    </div>
@endsection
