@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/brand/' . $brand->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}

            @include('brand.form', ['modo' => 'Editar']);

        </form>
    </div>
@endsection