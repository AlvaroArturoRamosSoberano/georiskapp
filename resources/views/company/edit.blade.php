Formulario de edicion de Empleado
<form action="{{ url('/company/' . $company->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

    @include('company.form');

</form>
