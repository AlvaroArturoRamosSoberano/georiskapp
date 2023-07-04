@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/companyRiskAspect') }}" method="post">
            @csrf
            @include('companyRiskAspect.form', ['modo' => 'Ingresar'])
        </form>
    @endsection
