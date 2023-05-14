<div class="container">
    <h1>{{ $modo }} Empresa</h1>

    <div class="row">
        <div class="col">
            <div class="form-floating">
                <input type="text" class="form-control" name="identifier_key" value="{{ $company->identifier_key }}" id="identifier_key" title="El identificador debe tener el formato XX/XXXXX/XXX/XX/XXXX" placeholder="Identificador">
                <label for="identifier_key">Identificador</label>
            </div>
        </div>

        <div class="col">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="description" value="{{ $company->description }}" id="description" placeholder="Descripción">
                <label for="description">Descripción</label>
            </div>
        </div>
    </div>

    <div class="mb-2">
        <label for="image_path">Imagen del Establecimiento</label>
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $company->image_path }}" alt="{{ $company->identifier_key }}" width="100">
        <input type="file" class="form-control" name="image_path" value="" id="image_path">
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating">
                <select class="form-select" name="kind_company" id="kind_company" placeholder="Tipo de Empresa">
                    <option value="">Seleccione un tipo de empresa</option>
                    @foreach ($companies as $id => $kind)
                    <option value="{{ $kind }}" {{ $company->kind_company == $kind ? 'selected' : '' }}>{{ $kind }}</option>
                    @endforeach
                </select>
                <label for="kind_company">Tipo de Empresa</label>
            </div>
        </div>

        <div class="col">
            <div class="form-floating mb-2">
                <select class="form-select" name="brand_id" id="brand_id" placeholder="Tipo de Linea">
                    <option value="">Seleccione una línea</option>
                    @foreach ($brands as $id => $name)
                    <option value="{{ $id }}" {{ $id == $company->brand_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                <label for="brand_id">Marca de la Empresa</label>
            </div>
        </div>
    </div>

    <div class="form-group mb-2">
        <label for="geographic_detail_id">Detalles Geograficos</label>
        <input type="text" class="form-control" name="geographic_detail_id" value="{{ $company->geographic_detail_id }}" id="geographic_detail_id">
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="latitude" value="" placeholder="Latitude">
                <label for="latitude">Latitud</label>
            </div>
        </div>

        <div class="col">
            <div class="form-floating">
                <input type="text" class="form-control" name="longitude" id="longitude" value="" placeholder="Longitud">
                <label for="longitude">Longitud</label>
            </div>
        </div>
    </div>

    <div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="address" name="address" value="" placeholder="Dirección">
            <label for="address">Dirección</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <div class="form-floating">
                <input type="text" class="form-control" name="zip_code" id="zip_code" value="" placeholder="Codigo postal">
                <label for="zip_code">Código Postal</label>
            </div>
        </div>

        <div class="col-4">
            <div class="form-floating">
                <select class="form-select" name="township" id="township" value="" placeholder="Municipio">
                    <option selected>Seleccione un Municipio</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="township">Municipio</label>
            </div>
        </div>

        <div class="col-4">
            <div class="form-floating">
                <select class="form-select" name="state" id="state" value="" placeholder="Estado">
                    <option selected>Seleccione un Estado</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="state">Estado</label>
            </div>
        </div>

        <div class="w-100 d-flex justify-content-end">
            <input class="btn btn-success btn-sm mt-2 me-2" type="submit" value="{{ $modo }} Empresa">
            <a class="btn btn-primary btn-sm mt-2" href="{{ url('company/') }}">Regresar</a>
        </div>
    </div>
    <script>
        // Obtener todos los campos de entrada en el formulario
        const inputs = document.querySelectorAll('input, select, textarea');

        // Agregar el evento keydown a cada campo de entrada
        inputs.forEach(input => {
            input.addEventListener('keydown', event => {
                // Si se presiona Enter
                if (event.keyCode === 13) {
                    // Obtener el índice del campo actual
                    const currentIndex = Array.from(inputs).indexOf(event.target);
                    // Obtener el índice del siguiente campo
                    const nextIndex = currentIndex + 1;
                    // Si el siguiente campo existe, mover el foco a él
                    if (inputs[nextIndex]) {
                        inputs[nextIndex].focus();
                        event.preventDefault();
                    }
                }
            });
        });
    </script>