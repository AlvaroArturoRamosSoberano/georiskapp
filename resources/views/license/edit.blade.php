@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/licencia/' . $license->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}

            @include('license.form', ['modo' =>'Editar'])
        </form>
    </div>
@endsection
