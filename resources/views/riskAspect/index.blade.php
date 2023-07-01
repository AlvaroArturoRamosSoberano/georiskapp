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
    </div>

    <body>
        <div class="containertab m-auto">
            <div class="table_header">
                <a href="{{ url('riskAspect/create') }}" class="btn btn-primary btn-sm">Ingresar Nuevo Aspecto de Riesgo</a>
                <div class="input_search">
                    <input type="text" class="search-input" placeholder="Busar" />
                    <i class="bi bi-search" id="search"></i>
                </div>
            </div>

            <div class="container">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Riesgo</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Numero 1</td>
                            <td>Tanque de gas</td>
                            <td>Jeje</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
@endsection
