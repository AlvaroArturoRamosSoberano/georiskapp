<head>

</head>

<div class="container">
    <div class="card">
        <h5 class="card-header">{{ $modo }} Riesgo</h5>
        <div class="card-body">
            <form>
                <fieldset>
                    <div class="row m-2">
                        <div class="col">
                            <div class="form-group">
                                <div class="form-floating">
                                    <select class="form-select" name="company_id" id="company_id" placeholder="Compañia">
                                        <option value="">Seleccione una empresa</option>
                                        @foreach ($companies as $id => $identifier_key)
                                            <option value="{{ $id }}"
                                                {{ $id == $companyRiskAspect->company_id ? 'selected' : '' }}>
                                                {{ $identifier_key }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="company_id">Compañia</label>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <div class="form-floating">
                                    <select class="form-select" name="risk_aspect_id" id="risk_aspect_id"
                                        placeholder="Riesgo">
                                        <option value="">Seleccione un riesgo</option>
                                        @foreach ($riskAspects as $id => $name)
                                            <option value="{{ $id }}"
                                                {{ $id == $companyRiskAspect->risk_aspect_id ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="risk_aspect_id">Riesgo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="w-100 d-flex justify-content-end">
                    <input class="btn btn-success btn-sm mt-2 me-2" type="submit"
                        value="{{ $modo }} Riesgo">
                    <a class="btn btn-primary btn-sm mt-2 me-2" href="{{ url('companyRiskAspect/') }}">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
