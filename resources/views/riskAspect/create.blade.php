@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/riskAspect') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('riskAspect.form', ['modo' => 'Ingresar'])
        </form>
    </div>
@endsection
