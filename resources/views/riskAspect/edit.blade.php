@extends('layouts.app')
@section('content')
    <form action="{{ url('/riskAspect/' . $riskAspect->id) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}
        @include('riskAspect.form', ['modo' => 'Editar'])
    </form>
@endsection
