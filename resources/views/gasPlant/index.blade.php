@extends('layouts.app')
@section('content')

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    </head>

    <body>
        <div class="containertab m-auto">
            <section class="table_header">
                <a href="{{ url('gasPlant/create') }}" class="btn btn-primary btn-sm">Ingresar Aspecto Regulatorio</a>
                <div class="input_search">
                    <input type="text" class="search-input" placeholder="Buscar">
                    <i class="bi bi-search" id="search"></i>
                </div>
            </section>

            <section class="container">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Compañia</th>
                            <th>Aspectos Regulatorios</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Example</td>
                            <td>Example</td>
                            <td>Example</td>
                            <td>Example</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
        
    </body>
@endsection
