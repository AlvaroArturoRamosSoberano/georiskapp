@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/brand') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('brand.form', ['modo' => 'Ingresar'])
        </form>
    @endsection
