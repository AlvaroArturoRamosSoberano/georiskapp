@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/license') }}" method="post">
            @csrf
            @include('license.form', ['modo' => 'Ingresar'])
        </form>
    </div>
@endsection
