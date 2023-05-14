@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <form action="{{ url('/company/' . $company->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        @include('company.form', ['modo' => 'Editar', 'brands' => $brands])


    </form>
</div>
@endsection