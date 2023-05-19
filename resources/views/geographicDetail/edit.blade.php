@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/geographicDetail/' . $geographic_detail->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}

            @include('geographicDetail.form', ['modo' => 'Editar']);

        </form>
    </div>
@endsection