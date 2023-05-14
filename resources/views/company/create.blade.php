@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif
<div class="container-fluid">
    <script src="{{ asset('js/formatIdentifierKey.js') }}"></script>

    <form action="{{ url('/company') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('company.form', ['modo' => 'Ingresar'])
    </form>


</div>

@endsection