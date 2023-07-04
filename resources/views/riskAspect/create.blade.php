@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/riskAspect') }}" method="post">
            @csrf
            @include('riskAspect.form', ['modo' => 'Ingresar'])
        </form>
    </div>
@endsection
