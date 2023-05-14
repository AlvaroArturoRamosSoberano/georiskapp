@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Formulario de Detalles Geograficos</h1>
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
    </div>

    <div class="w-100 d-flex justify-content-end">
        <input class="btn btn-success btn-sm mt-2 me-2" type="submit" value="Empresa">
        <a class="btn btn-primary btn-sm mt-2" href="{{ url('company/') }}">Regresar</a>
    </div>
</div>
@endsection