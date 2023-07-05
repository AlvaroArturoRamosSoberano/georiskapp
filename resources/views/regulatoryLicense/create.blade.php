@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/regulatoryLicense/') }}" method="post">
            @csrf
            @include('regulatoryLicense.form', ['modo' => 'Ingresar'])
        </form>
    </div>
@endsection
