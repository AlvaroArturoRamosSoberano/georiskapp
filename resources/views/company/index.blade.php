Mostrar listado de empresas
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Imagen Establecimiento</th>
            <th>Identificador</th>
            <th>Descripción</th>
            <th>Tipo de Compañia</th>
            <th>Marca</th>
            <th>Detalles geograficos</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->image_path }}</td>
                <td>{{ $company->identifier_key }}</td>
                <td>{{ $company->description }}</td>
                <td>{{ $company->kind_company }}</td>
                <td>{{ $company->brand_id }}</td>
                <td>{{ $company->geographic_detail_id }}</td>
                <td>
                    <a href="{{ url('/company/' . $company->id . '/edit') }}">
                        Editar
                    </a>
                    |
                    <form action="{{ url('/company/' . $company->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>

</table>
