@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <form action="{{ url('/geographicDetail') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('geographicDetail.form', ['modo' => 'Ingresar'])
    </form>
</div>
@endsection