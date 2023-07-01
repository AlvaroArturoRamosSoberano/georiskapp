@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/license') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('license.form', ['modo' => 'Ingresar'])
        </form>
    </div>
@endsection
