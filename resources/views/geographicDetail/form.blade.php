<div class="container">
    <div class="card">
        <h5 class="card-header">{{ $modo }} Empresa</h5>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="latitude" id="latitude"
                                value="{{ $geographic_detail->latitude }}" placeholder="Latitude">
                            <label for="latitude">Latitud</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="longitude" id="longitude"
                                value="{{ $geographic_detail->longitude }}" placeholder="Longitud">
                            <label for="longitude">Longitud</label>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $geographic_detail->address }}" placeholder="Dirección">
                        <label for="address">Dirección</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="zip_code" id="zip_code"
                                value="{{ $geographic_detail->zip_code }}" placeholder="Codigo postal">
                            <label for="zip_code">Código Postal</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating">
                            <select class="form-select" name="colony_id" id="colony_id" placeholder="Colonia">
                                <option value="">Seleccione una Colonia</option>
                                @foreach ($colonies as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ $id == $geographic_detail->colony_id ? 'selected' : '' }}>{{ $name }}
                                    </option>
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
                                    <option value="{{ $id }}"
                                        {{ $id == $geographic_detail->township_id ? 'selected' : '' }}>
                                        {{ $name }}</option>
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
                                    <option value="{{ $id }}"
                                        {{ $id == $geographic_detail->state_id ? 'selected' : '' }}>
                                        {{ $name }}</option>
                                @endforeach
                            </select>
                            <label for="state_id">Estado</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="identifier_key"
                                value="{{ $company->identifier_key }}" id="identifier_key"
                                title="El identificador debe tener el formato XX/XXXXX/XXX/XX/XXXX"
                                placeholder="Identificador">
                            <label for="identifier_key">Identificador</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="description"
                                value="{{ $company->description }}" id="description" placeholder="Descripción">
                            <label for="description">Descripción</label>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="image_path">Imagen del Establecimiento</label>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $company->image_path }}"
                        alt="{{ $company->identifier_key }}" width="100">
                    <input type="file" class="form-control" name="image_path" value="" id="image_path">
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="form-floating">
                                <select v-model="formData.company_type_id" class="form-select" name="company_type_id"
                                    id="company_type_id" placeholder="Tipo de Empresa">
                                    <option value="">Seleccione un tipo de empresa</option>
                                    @foreach ($companies as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ $id == $company->company_type_id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                    <option value="other">Otro</option>
                                </select>
                                <label for="company_type_id">Tipo de Empresa</label>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating mb-2">
                            <select class="form-select" name="brand_id" id="brand_id" placeholder="Tipo de Linea">
                                <option value="">Seleccione una línea</option>
                                @foreach ($brands as $id => $name)
                                    <option value="{{ $id }}"
                                        {{ $id == $company->brand_id ? 'selected' : '' }}>
                                        {{ $name }}</option>
                                @endforeach
                            </select>
                            <label for="brand_id">Marca de la Empresa</label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-2">
                    <input type="text" class="form-control" name="geographic_detail_id"
                        value="{{ $company->geographic_detail_id }}" id="geographic_detail_id" hidden>
                </div>

                <div class="w-100 d-flex justify-content-end">
                    <input class="btn btn-success btn-sm mt-2 me-2" type="submit"
                        value="{{ $modo }} Empresa">
                    <a class="btn btn-primary btn-sm mt-2" href="{{ url('company/') }}">Regresar</a>
                </div>
            </form>
        </div>
    </div>


</div>
