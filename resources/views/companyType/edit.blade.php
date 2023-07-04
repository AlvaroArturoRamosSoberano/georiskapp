@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <form action="{{ url('/companyType/' . $company->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}

            @include('companyType.form', ['modo' => 'Editar']);

        </form>
    </div>
@endsection
