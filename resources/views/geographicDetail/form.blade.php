<div class="container">
    <h1>Formulario de Detalles Geograficos</h1>
    <div class="row">
        <div class="col">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="latitude" id="latitude" value="{{$geographic_detail->latitude}}" placeholder="Latitude">
                <label for="latitude">Latitud</label>
            </div>
        </div>

        <div class="col">
            <div class="form-floating">
                <input type="text" class="form-control" name="longitude" id="longitude" value="{{$geographic_detail->longitude}}" placeholder="Longitud">
                <label for="longitude">Longitud</label>
            </div>
        </div>
    </div>

    <div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="address" name="address" value="{{$geographic_detail->address}}" placeholder="Dirección">
            <label for="address">Dirección</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <div class="form-floating">
                <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{$geographic_detail->zip_code}}" placeholder="Codigo postal">
                <label for="zip_code">Código Postal</label>
            </div>
        </div>

        <div class="col-4">
            <div class="form-floating">
                <select class="form-select" name="colony_id" id="colony_id" placeholder="Colonia">
                    <option value="">Seleccione una Colonia</option>
                    @foreach ($colonies as $id => $name)
                    <option value="{{ $id }}" {{$id == $geographic_detail->colony_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                <label for="colony_id">Colonia</label>
            </div>
        </div>

        <div class="col-3">
            <div class="form-floating">
                <select class="form-select" name="township_id" id="township_id" placeholder="Municipio">
                    <option value="">Seleccione un Municipio</option>
                    @foreach ($townships as $id => $name)
                    <option value="{{ $id }}" {{$id == $geographic_detail->township_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                <label for="township_id">Municipio</label>
            </div>
        </div>

        <div class="col-3">
            <div class="form-floating">
                <select class="form-select" name="state_id" id="state_id" placeholder="Estado">
                    <option value="">Seleccione un Estado</option>
                    @foreach ($states as $id => $name)
                    <option value="{{ $id }}" {{$id == $geographic_detail->state_id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                <label for="state_id">Estado</label>
            </div>
        </div>
    </div>

    <div class="w-100 d-flex justify-content-end">
        <input class="btn btn-success btn-sm mt-2 me-2" type="submit" value="Empresa">
        <a class="btn btn-primary btn-sm mt-2" href="{{ url('geographicDetail/') }}">Regresar</a>
    </div>
</div>