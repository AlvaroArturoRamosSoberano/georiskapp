@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/gasPlant') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('gasPlant.form', ['modo' => 'Ingresar'])
        </form>
    </div>
@endsection
