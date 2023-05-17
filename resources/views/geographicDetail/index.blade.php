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
        <div class="d-flex justify-content-between">
            <a href="{{ url('geographicDetail/create') }}" class="btn btn-primary btn-sm mb-2">Ingresar detalles geograficos</a>
            <form class="d-flex" action="{{ route('geographicDetail.index') }}" method="GET">
                <button class="btn btn-primary btn-sm mb-2" type="submit">Buscar</button>
                @if (request('q'))
                <a href="{{ route('geographicDetail.index') }}" class="btn btn-secondary btn-sm ms-2 mb-2">Mostrar todo</a>
                @endif
            </form>
        </div>
    </div>



</div>

@endsection