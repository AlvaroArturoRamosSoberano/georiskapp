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
                <a href="{{ url('/regulatoryLicense/create') }}" class="btn btn-primary btn-sm">Ingresar Nuevo</a>
                <div class="input_search">
                    <input type="text" class="search-input" placeholder="Buscar">
                    <i class="bi bi-search" id="search"></i>
                </div>
            </div>
            <div class="container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>License ID</th>
                            <th></th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </body>
@endsection
