@extends('layouts.app')
@section('content')
    <form action="{{ url('/companyRiskAspect/' . $companyRiskAspect->id) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}
        @include('companyRiskAspect.form', ['modo' => 'Editar'])
    </form>
@endsection
