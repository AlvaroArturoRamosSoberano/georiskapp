@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/regulatoryLicense/' . $regulatoryLicense->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            @include('regulatoryLicense.form', ['modo' => 'Editar']);
        </form>
    </div>
@endsection
