@extends('layouts.app')
@section('content')
    <form action="{{ url('/regulatoryAspect') }}" method="post">
        @csrf
        @include('regulatoryAspect.form', ['modo' => 'Ingresar']);
    </form>
@endsection
