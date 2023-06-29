@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/companyRiskAspect') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('companyRiskAspect.form', ['modo' => 'Ingresar'])
        </form>
    @endsection
