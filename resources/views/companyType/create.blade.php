@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/companyType') }}" method="post">
            @csrf
            @include('companyType.form', ['modo' => 'Ingresar'])
        </form>
    @endsection
