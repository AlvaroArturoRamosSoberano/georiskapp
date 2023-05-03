Formulario de Creacion de Empleado

<form action="{{ url('/company') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="identifier_key">Identificador</label>
    <input type="text" name="identifier_key" id="identifier_key">
    <br>

    <label for="description">Descripción</label>
    <input type="text" name="description" id="description">
    <br>

    <label for="image_path">Imagen del Establecimiento</label>
    <input type="file" name="image_path" id="image_path">
    <br>

    <label for="kind_company">Tipo de Empresa</label>
    <input type="text" name="kind_company" id="kind_company">
    <br>

    <label for="brand_id">Marca de la Empresa</label>
    <input type="text" name="brand_id" id="brand_id">
    <br>

    <label for="geographic_detail_id">Detalles Geograficos</label>
    <input type="text" name="geographic_detail_id" id="geographic_detail_id">
    <br>

    <input type="submit" value="Ingresar">
</form>

<!-- /resources/views/post/create.blade.php -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->
